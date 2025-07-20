<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $resetUrl;

    public function __construct($resetUrl)
    {
        $this->resetUrl = $resetUrl;
    }

    public function build()
    {
        return $this->subject('Reset Password PiNetMart')
                    ->view('emails.customer-reset-password') // Pastikan file ini ada!
                    ->with([
                        'resetUrl' => $this->resetUrl,
                    ]);
    }
}
