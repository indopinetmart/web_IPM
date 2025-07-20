<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Pinetmart\Customer\WebAuthController as CustomerWebAuthController;
use App\Http\Controllers\Indopinetmart\View;
use App\Http\Controllers\Pinetmart\PinetController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| INDOPINETMART
|--------------------------------------------------------------------------
*/
Route::get('/', [View::class, 'index']);
Route::get('/under-construction', [View::class, 'underconstruction'])->name('under.construction');


/*
|--------------------------------------------------------------------------
| PERWIRA
|--------------------------------------------------------------------------
*/
Route::middleware('signed')->group(function () {
    Route::get('/perwira/splash', [View::class, 'splash'])->name('perwira.splash');
    Route::get('/perwira/view', [View::class, 'viewPerwira'])->name('perwira.view');
});


/*
|--------------------------------------------------------------------------
| PINETMART
|--------------------------------------------------------------------------
*/
Route::middleware('signed')->group(function () {
    // Splash screen
    Route::get('/pinet/splash', [PinetController::class, 'splash'])->name('pinet.splash');

    // Guest-only home via signed URL
    Route::get('/pinet/guest/home', [PinetController::class, 'guestHome'])
        ->name('pinet.home.guest')
        ->middleware(['limit.signed.attempts', 'guest:customer']);
});


/*
|--------------------------------------------------------------------------
| CUSTOMER AUTH & ACCOUNT ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('akun')->name('customer.')->middleware('guest:customer')->group(function () {

    // Login (GET: form login, POST: kirim link via email)
    Route::get('/login', [CustomerWebAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [CustomerWebAuthController::class, 'processLogin'])
        ->name('login.process')
        ->middleware('throttle:5,1');

    // Pending verification (cek email)
    Route::view('/pending-verification', 'auth.login_pending')->name('login.pending');

    // Verifikasi login token dari email
    Route::get('/verify/{token}', [CustomerWebAuthController::class, 'verifyLoginToken'])
        ->name('login.verify')
        ->middleware('throttle:10,1');

    // Register
    Route::post('/register', [CustomerWebAuthController::class, 'register'])
        ->name('register')
        ->middleware('throttle:5,1');

    // Forgot Password - kirim email
    Route::post('/forgot-password', [CustomerWebAuthController::class, 'sendResetLinkEmail'])
        ->name('password.email')
        ->middleware('throttle:5,1');

    // Reset Password - tampilkan form dari email
    Route::get('/reset-password/{token}', [CustomerWebAuthController::class, 'showResetForm'])
        ->name('password.reset')
        ->middleware('signed');

    // Reset Password - submit password baru
    Route::post('/reset-password', [CustomerWebAuthController::class, 'resetPassword'])
        ->name('password.update')
        ->middleware('throttle:5,1');
});


/*
|--------------------------------------------------------------------------
| VERIFIKASI EMAIL (Untuk Customer)
|--------------------------------------------------------------------------
*/
Route::get('/email/verify/{id}/{hash}', [CustomerWebAuthController::class, 'verify'])
    ->middleware(['signed'])
    ->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $user = $request->user('customer');
    if ($user) {
        $user->sendEmailVerificationNotification();
        return back()->with('message', 'Link verifikasi telah dikirim!');
    }
    return back()->with('error', 'Tidak ada user login.');
})->middleware(['auth:customer', 'throttle:6,1'])->name('verification.send');


/*
|--------------------------------------------------------------------------
| AUTHENTICATED CUSTOMER
|--------------------------------------------------------------------------
*/
Route::prefix('customer')->name('customer.')->middleware('auth:customer')->group(function () {

    // Halaman dashboard setelah login (gunakan hash unik user/email)
    Route::get('/pinet/home/{hash}', [PinetController::class, 'homePinet'])->name('pinet.home');

    // Logout
    Route::post('/logout', function (Request $request) {
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('customer.login')->with('success', 'Berhasil logout!');
    })->name('logout');
});
