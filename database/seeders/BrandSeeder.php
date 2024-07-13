<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run()
    {
        $brands = [
            ['name' => 'Marca A', 'photo' => 'marca_a.jpg'],
            ['name' => 'Marca B', 'photo' => 'marca_b.jpg'],
            ['name' => 'Marca C', 'photo' => 'marca_c.jpg'],
        ];

        foreach ($brands as $brand) {
            Brand::create($brand);
        }
    }
}
