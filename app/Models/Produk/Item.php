<?php

namespace App\Models\Produk;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produk\Category as ProdukCategory;

class Item extends Model
{
    protected $fillable = ['category_id', 'name', 'slug', 'description', 'price', 'image'];

    public function category()
    {
        return $this->belongsTo(ProdukCategory::class);
    }

     public function priceFormatted()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }
}
