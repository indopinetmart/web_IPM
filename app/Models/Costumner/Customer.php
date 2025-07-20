<?php

namespace App\Models\Costumner;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens; // ✅ Tambahkan ini

class Customer extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable; // ✅ Tambahkan di sini

    protected $guard = 'customer';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'country',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function generateLoginToken()
    {
        $this->login_token = Str::random(32);
        $this->save();
    }
    public function generateUrlHash()
    {
        return hash('sha256', $this->id . '|' . config('app.customer_url_secret'));
    }
}
