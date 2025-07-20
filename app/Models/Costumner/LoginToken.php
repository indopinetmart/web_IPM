<?php

namespace App\Models\Costumner;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LoginToken extends Model
{
    protected $fillable = [
        'customer_id',
        'token',
        'expires_at',
        'ip_address',
        'user_agent',
        'device',
        'platform',
        'browser',
        'country',
        'region',
        'city',
        'latitude',
        'longitude',
    ];

    public $timestamps = true;

    protected $casts = [
        'expires_at' => 'datetime',
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
