<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Mobil', 'slug' => 'mobil', 'icon' => 'car.png'],
            ['name' => 'Properti', 'slug' => 'properti', 'icon' => 'property.png'],
            ['name' => 'Barang Gratis', 'slug' => 'gratis', 'icon' => 'gift.png'],
        ]);
    }
}
