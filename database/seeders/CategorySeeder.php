<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Makanan', 'slug' => 'makanan'],
            ['name' => 'Snack', 'slug' => 'snack'],
            ['name' => 'Minuman', 'slug' => 'minuman'],
            ['name' => 'Roti', 'slug' => 'roti'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}