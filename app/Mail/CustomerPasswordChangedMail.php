<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerPasswordChangedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;

    public function __construct($name = null)
    {
        $this->name = $name;
    }

    public function build()
    {
        return $this->subject('Password Anda Telah Berhasil Diubah')
            ->view('emails.customer.password_changed')
            ->with([
                'name' => $this->name,
            ]);
    }
}
