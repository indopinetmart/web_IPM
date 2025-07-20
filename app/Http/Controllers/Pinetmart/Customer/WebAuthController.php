<?php

namespace App\Http\Controllers\Pinetmart\Customer;

use App\Http\Controllers\Controller;
use App\Models\Costumner\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Mail;
use App\Mail\LoginVerificationMail;
use App\Models\Costumner\LoginToken;
use Illuminate\Support\Facades\URL;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Mail\CustomerPasswordChangedMail;

use Carbon\Carbon;


class WebAuthController extends Controller
{
    /**
     * LOGIKA form login
     */
    public function showLoginForm()
    {
        return view('pinetmart.Auth.login');
    }

    public function processLogin(Request $request)
    {
        // 🔐 1. Validasi input
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);
    
        // 🔍 2. Cari user
        $user = Customer::where('email', $request->email)->first();
    
        // ❌ 3. Cek kredensial
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Email atau password salah.'], 401);
        }
    
        // 🔒 4. Cek status akun
        if ($user->status != 1) {
            return response()->json(['message' => 'Akun Anda sedang disuspend, <br> Hubungi Penyedia Layanan'], 403);
        }
    
        // 🌐 5. Ambil info IP & device
        $ip = $request->ip();
        $userAgent = $request->userAgent();
        $agent = new \Jenssegers\Agent\Agent();
        $device   = $agent->device() ?: 'Unknown';
        $platform = $agent->platform() . ' ' . $agent->version($agent->platform());
        $browser  = $agent->browser() . ' ' . $agent->version($agent->browser());
    
        // 🗺️ 6. Ambil lokasi dari IP (gunakan ipwhois.io)
        $country = $region = $city = $latitude = $longitude = null;
        try {
            $ipwhoisUrl = config('app.ipwhois_url');
            $response = Http::timeout(5)->get("{$ipwhoisUrl}/{$ip}");
    
            if ($response->ok()) {
                $data = $response->json();
                $country   = $data['country'] ?? null;
                $region    = $data['region'] ?? null;
                $city      = $data['city'] ?? null;
                $latitude  = $data['latitude'] ?? null;
                $longitude = $data['longitude'] ?? null;
            }
        } catch (\Exception $e) {
            logger()->warning('Gagal ambil lokasi IP', ['ip' => $ip, 'error' => $e->getMessage()]);
        }
    
        // 🧹 7. Hapus semua token login aktif sebelumnya
        LoginToken::where('customer_id', $user->id)
            ->whereNull('used_at')
            ->delete();
    
        // 🔑 8. Buat token login baru
        $rawToken    = Str::random(64);
        $hashedToken = hash('sha256', $rawToken);
    
        LoginToken::create([
            'customer_id' => $user->id,
            'token'       => $hashedToken,
            'expires_at'  => now()->addHours(3),
            'ip_address'  => $ip,
            'user_agent'  => $userAgent,
            'device'      => $device,
            'platform'    => $platform,
            'browser'     => $browser,
            'country'     => $country,
            'region'      => $region,
            'city'        => $city,
            'latitude'    => $latitude,
            'longitude'   => $longitude,
            'used_at'     => null,
        ]);
    
        // 📩 9. Kirim email verifikasi login
        $url = route('customer.login.verify', ['token' => $rawToken]);
    
        try {
            Mail::to($user->email)->send(
                new \App\Mail\LoginVerificationMail($url, $ip)
            );
    
            return response()->json([
                'message' => 'Link verifikasi login telah dikirim ke email Anda.'
            ]);
        } catch (\Exception $e) {
            logger()->error('Gagal mengirim email login verifikasi', [
                'email' => $user->email,
                'error' => $e->getMessage(),
            ]);
    
            return response()->json([
                'message' => 'Gagal mengirim email. Silakan coba lagi nanti.'
            ], 500);
        }
    }


    public function verifyLoginToken(Request $request, $token)
    {
        $hashedToken = hash('sha256', $token);

        $loginToken = LoginToken::where('token', $hashedToken)
            ->where('expires_at', '>', now())
            ->whereNull('used_at')
            ->first();

        if (!$loginToken) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Maaf, akses ditolak. Silahkan Login Ulang.'
                ], 403);
            }

            return redirect()->route('customer.login')
                ->with('error', 'Maaf, akses ditolak. Silahkan Login Ulang.');
        }

        $customer = Customer::find($loginToken->customer_id);
        if (!$customer) {
            return redirect()->route('customer.login')->with('error', 'User tidak ditemukan.');
        }

        // Tandai token sudah digunakan
        $loginToken->used_at = now();
        $loginToken->save();

        // Login manual (session web)
        Auth::guard('customer')->login($customer);

        // ✅ Jangan hapus token lama — hanya buat kalau belum ada
        if ($customer->tokens()->where('name', 'customer_app_token')->doesntExist()) {
            $customer->createToken('customer_app_token');
        }

        // Simpan session web biasa
        session([
            'login_session'     => true,
            'login_expires_at'  => now()->addHours(3),
        ]);

        logger()->info('Login berhasil dengan token verifikasi', [
            'customer_id' => $customer->id,
            'ip'          => $request->ip(),
            'ua'          => $request->userAgent(),
        ]);

          // Generate hash
        $customerId = $customer->id;
        $hash = hash('sha256', env('CUSTOMER_URL_SECRET') . $customerId);
        
        return redirect()->route('customer.pinet.home', ['hash' => $hash])
            ->with('success', 'Login berhasil!');
    }



    /**
     * Logout customer
     */
    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/masuk');
    }


    /**
     * LOGIKA form REGISTER
     */
    public function register(Request $request)
    {
        // 1. ✅ VALIDASI INPUT DASAR
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $validator->errors(),
            ], 422);
        }

        // 2. 🚫 CEGAH EMAIL & NOMOR TELEPON DUPLIKAT
        $email = strtolower($request->email);
        $phone = preg_replace('/[^0-9+]/', '', $request->phone);

        if (Customer::where('email', $email)->exists()) {
            return response()->json([
                'message' => 'Email sudah terdaftar. Gunakan email lain.',
            ], 409);
        }

        if (Customer::where('phone', $phone)->exists()) {
            return response()->json([
                'message' => 'Nomor telepon sudah terdaftar. Gunakan nomor lain.',
            ], 409);
        }

        // 3. 🧹 FILTER EMAIL DISPOSABLE
        $blockedDomains = [
            '@tempmail',
            '@mailinator',
            '@10minutemail',
            '@guerrillamail',
            '@yopmail',
            '@dispostable',
            '@fakeinbox',
            '@trashmail',
            '@maildrop',
            '@getnada',
            '@inboxbear',
            '@sharklasers',
        ];

        foreach ($blockedDomains as $domain) {
            if (Str::contains($email, $domain)) {
                return response()->json([
                    'message' => 'Email tidak valid. Harap gunakan email yang sah.',
                ], 422);
            }
        }

        // 4. 🧹 SANITASI INPUT
        $name = strip_tags($request->name);
        $country = strip_tags($request->country);

        // 5. 🛡️ SIMPAN DATA
        $customer = Customer::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($request->password),
            'phone' => $phone,
            'status' => 1, // optional karena default-nya 1
            'country' => $country,
        ]);

        // 6. 📩 KIRIM EMAIL VERIFIKASI
        event(new Registered($customer));

        // 7. ✅ KIRIM RESPON SUKSES
        return response()->json([
            'message' => 'Registrasi berhasil, silakan cek email untuk verifikasi.',
        ]);
    }

    /**
     * LOGIKA VERIFY ID HASH
     */
    public function verify($id, $hash)
    {
        $user = Customer::findOrFail($id);

        if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            abort(403, 'Link verifikasi tidak valid.');
        }

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
            event(new Verified($user));
        }

        return redirect()->route('customer.login')->with('success', 'Email berhasil diverifikasi. Silakan login.');
    }


    /**
     * LOGIKA SEND VERIFIKASI EMAIL RESET PASSWORD
     */
    public function sendResetLinkEmail(Request $request)
    {
        // ✅ Validasi request
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = strtolower($request->email);

        // 🔍 Cari user berdasarkan email
        $customer = Customer::where('email', $email)->first();

        if (!$customer) {
            return response()->json([
                'message' => 'Email tidak ditemukan di sistem kami.'
            ], 404);
        }

        // 🔐 Generate token & hash
        $plainToken = Str::random(64);
        $hashedToken = hash('sha256', $plainToken);

        // 🛢️ Simpan token ke tabel password_resets
        $table = config('auth.passwords.customers.table');
        DB::table($table)->updateOrInsert(
            ['email' => $customer->email],
            [
                'token' => $hashedToken,
                'created_at' => now(),
            ]
        );

        // 🔗 Buat signed URL reset password
        $resetUrl = URL::temporarySignedRoute(
            'customer.password.reset', // Pastikan route ini ada
            now()->addMinutes(30),
            [
                'token' => $plainToken,
                'email' => $customer->email,
            ]
        );

        // 📬 Kirim email reset password
        try {
            Mail::to($customer->email)->send(new \App\Mail\CustomerResetPasswordMail($resetUrl));

            return response()->json([
                'message' => 'Link reset password berhasil dikirim ke email Anda.'
            ]);
        } catch (\Exception $e) {
            logger()->error('Gagal kirim email reset password', [
                'email' => $customer->email,
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'message' => 'Gagal mengirim email. Silakan coba lagi nanti.'
            ], 500);
        }
    }

    /**
     * TAMPIL HALAMAN RESET PASSWORD
     */
    public function showResetForm(Request $request)
    {
        if (! $request->hasValidSignature()) {
            abort(403, 'Link reset password tidak valid atau telah kedaluwarsa.');
        }

        return view('pinetmart.Auth.reset_password', [
            'email' => $request->email,
            'token' => $request->token,
        ]);
    }


    /**
     * TAMPIL HALAMAN RESET PASSWORD
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $table = config('auth.passwords.customers.table');
        $hashedToken = hash('sha256', $request->token);

        $reset = DB::table($table)
            ->where('email', $request->email)
            ->where('token', $hashedToken)
            ->first();

        if (!$reset) {
            return back()->withErrors(['email' => 'Token reset tidak valid atau telah digunakan.']);
        }

        $customer = Customer::where('email', $request->email)->first();
        if (!$customer) {
            return back()->withErrors(['email' => 'Akun tidak ditemukan.']);
        }

        // Reset password
        $customer->password = Hash::make($request->password);
        $customer->save();

        // Hapus token
        DB::table($table)->where('email', $request->email)->delete();

        return redirect()->route('customer.login')->with('success', 'Password berhasil diubah. Silakan login.');
    }

    /**
     * UPDATE PASSWORD BARU
     */

    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $email = strtolower($request->email);
        $table = config('auth.passwords.customers.table');
        $hashedToken = hash('sha256', $request->token);

        $tokenRecord = DB::table($table)
            ->where('email', $email)
            ->where('token', $hashedToken)
            ->where('created_at', '>=', now()->subMinutes(config('auth.passwords.customers.expire')))
            ->first();

        if (!$tokenRecord) {
            return back()->withErrors(['token' => 'Token tidak valid atau sudah kedaluwarsa.']);
        }

        $customer = Customer::where('email', $email)->first();
        if (!$customer) {
            return back()->withErrors(['email' => 'Email tidak ditemukan.']);
        }

        // Reset password
        $customer->password = Hash::make($request->password);
        $customer->save();

        // Hapus token setelah digunakan
        DB::table($table)->where('email', $email)->delete();

        // Kirim notifikasi email bahwa password telah diubah
        try {
            Mail::to($customer->email)->send(new CustomerPasswordChangedMail($customer->name));
        } catch (\Exception $e) {
            logger()->error('Gagal kirim email notifikasi reset password', [
                'email' => $customer->email,
                'error' => $e->getMessage(),
            ]);
        }

        return redirect()->route('customer.login')->with('success', 'Password berhasil direset. Silakan login.');
    }
}
