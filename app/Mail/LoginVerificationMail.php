<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoginVerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $url;
    public string $ip;

    public function __construct(string $url, string $ip)
    {
        $this->url = $url;
        $this->ip = $ip;
    }

    public function build()
    {
         return $this->subject('Verifikasi Login - ' . now()->format('H:i:s'))
            ->view('emails.verify-login')
            ->with([
                'url' => $this->url,
                'ip' => $this->ip,
            ]);
    }
}
