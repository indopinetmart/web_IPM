<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Routing\Exceptions\InvalidSignatureException;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $levels = [];

    protected $dontReport = [];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof InvalidSignatureException) {
            return redirect()->route('customer.login')
                ->with('error', 'Link verifikasi sudah tidak berlaku atau kadaluarsa. Silakan login dan minta ulang verifikasi.');
        }

        return parent::render($request, $exception);
    }
}
