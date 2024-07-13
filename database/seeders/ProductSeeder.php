<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Produto 1',
                'description' => 'Descrição do Produto 1',
                'stock' => 100,
                'price' => 99.99,
                'photo' => 'produto1.jpg',
                'category_id' => 1,
                'photo_mini' => 'produto1_mini.jpg',
            ],
            [
                'name' => 'Produto 2',
                'description' => 'Descrição do Produto 2',
                'stock' => 50,
                'price' => 49.99,
                'photo' => 'produto2.jpg',
                'category_id' => 2,
                'photo_mini' => 'produto2_mini.jpg',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
