<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        $categories = DB::table('categories')->get();

        foreach ($categories as $category) {
            for ($i = 1; $i <= 3; $i++) {
                $name = $this->generateProductName($category->name, $i);
                DB::table('items')->insert([
                    'category_id' => $category->id,
                    'name'        => $name,
                    'slug'        => Str::slug($name),
                    'description' => 'Deskripsi produk ' . $name,
                    'price'       => $this->generatePrice($category->name),
                    'image'       => strtolower($category->slug) . $i . '.jpg', // contoh: mobil1.jpg
                ]);
            }
        }
    }

    private function generateProductName($categoryName, $index)
    {
        return match ($categoryName) {
            'Mobil' => "Mobil Bekas $index",
            'Properti' => "Rumah Dijual $index",
            'Barang Gratis' => "Barang Gratis $index",
            default => "Produk $index"
        };
    }

    private function generatePrice($categoryName)
    {
        return match ($categoryName) {
            'Mobil' => rand(50000000, 300000000),
            'Properti' => rand(200000000, 1500000000),
            'Barang Gratis' => 0,
            default => rand(10000, 100000)
        };
    }
}
