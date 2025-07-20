<?php

namespace App\Models\Produk;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produk\Item; // ✅ Tambahkan ini

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'icon'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
