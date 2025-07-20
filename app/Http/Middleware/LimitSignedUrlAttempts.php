<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\IpBlockedNotification;

class LimitSignedUrlAttempts
{
    // Maksimum percobaan gagal untuk URL tertentu sebelum memblokir akses ke URL itu
    protected $maxAttemptsPerURL = 1;

    // Maksimum total percobaan gagal dari 1 IP ke semua signed URL sebelum IP diblokir
    protected $maxGlobalAttempts = 1;

    // Durasi pemblokiran IP dalam menit jika melebihi batas global (1 hari = 1440 menit)
    protected $blockDurationMinutes = 60 * 24;


    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();
        $url = $request->fullUrl();

        $urlKey = 'signed_url_attempts:' . sha1($url . '|' . $ip);
        $globalKey = 'signed_url_global_attempts:' . sha1($ip);
        $blockKey = 'signed_url_blocked:' . $ip;

        Log::info("🔍 Middleware aktif untuk IP: $ip");

        // Jika IP sudah diblokir
        if (Cache::has($blockKey)) {
            Log::warning("⛔ IP $ip diblokir (masih aktif).");
            return abort(403, 'IP Anda diblokir sementara karena terlalu banyak percobaan.');
        }

        // Jika signed URL tidak valid
        if (! $request->hasValidSignature()) {
            Log::warning("🚫 Signature tidak valid dari IP: $ip");

            // Log ke DB
            DB::table('signed_url_logs')->insert([
                'ip' => $ip,
                'url' => $url,
                'is_valid' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Increment per-URL attempts
            if (!Cache::has($urlKey)) {
                Cache::put($urlKey, 1, now()->addDay());
                $urlAttempts = 1;
            } else {
                $urlAttempts = Cache::increment($urlKey);
            }

            // Increment global attempts
            if (!Cache::has($globalKey)) {
                Cache::put($globalKey, 1, now()->addDay());
                $globalAttempts = 1;
            } else {
                $globalAttempts = Cache::increment($globalKey);
            }

            Log::info("📌 Percobaan ke-$urlAttempts untuk URL, ke-$globalAttempts secara global oleh IP: $ip");

            // Blokir jika global attempts melebihi batas
            if ($globalAttempts >= $this->maxGlobalAttempts) {
                Cache::put($blockKey, true, now()->addMinutes($this->blockDurationMinutes));
                Log::error("🔥 IP $ip diblokir karena terlalu banyak percobaan global.");

                // Kirim notifikasi email
                $adminEmail = config('mail.blocked_ip_receiver');
                if ($adminEmail) {
                    Mail::to($adminEmail)->send(new IpBlockedNotification($ip, $this->maxGlobalAttempts));
                }

                return abort(403, 'IP Anda telah diblokir karena terlalu banyak percobaan.');
            }

            // Jika hanya per URL melebihi batas
            if ($urlAttempts > $this->maxAttemptsPerURL) {
                return abort(403, 'Percobaan akses ke URL ini terlalu banyak.');
            }

            return abort(403, 'URL tidak valid atau sudah kadaluarsa.');
        }

        // Signature valid, simpan log
        DB::table('signed_url_logs')->insert([
            'ip' => $ip,
            'url' => $url,
            'is_valid' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Log::info("✅ Signature valid untuk IP: $ip");

        return $next($request);
    }
}
