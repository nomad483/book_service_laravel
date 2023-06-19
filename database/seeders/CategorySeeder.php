<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::query()->create([
            'category_name' => 'Fiction',
        ]);

        Category::query()->create([
            'category_name' => 'Mystery',
        ]);
    }
}
