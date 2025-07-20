<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class IpBlockedNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $ip;
    public $attempts;

    public function __construct($ip, $attempts)
    {
        $this->ip = $ip;
        $this->attempts = $attempts;
    }

    public function build()
    {
        return $this->subject('⚠️ IP Diblokir karena Percobaan Signed URL')
                    ->markdown('emails.ip_blocked')
                    ->with([
                        'ip' => $this->ip,
                        'attempts' => $this->attempts,
                    ]);
    }
}
