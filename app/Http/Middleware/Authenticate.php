<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            return null;
        }

        // Periksa jika user menggunakan guard 'guest'
        if (
            $request->routeIs('customer.*') ||           // route('customer.*')
            $request->is('akun') ||                      // /akun
            $request->is('register') ||                  // /register
            $request->is('email/verify*')                // /email/verify/*
        ) {
            return route('customer.login'); // arahkan ke /akun
        }

        // Default fallback
        return route('login');
    }
}
