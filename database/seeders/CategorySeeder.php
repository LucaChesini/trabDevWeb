<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Eletrônicos', 'description' => 'Produtos eletrônicos diversos'],
            ['name' => 'Moda', 'description' => 'Roupas e acessórios de moda'],
            ['name' => 'Livros', 'description' => 'Livros de diversos gêneros'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
