<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::query()->create([
            'title' => 'Book 1',
            'author_id' => 1,
            'publication_date' => '2022-01-01',
            'price' => 9.99,
            'quantity_available' => 10,
        ]);

        Book::query()->create([
            'title' => 'Book 2',
            'author_id' => 2,
            'publication_date' => '2022-12-12',
            'price' => 14.99,
            'quantity_available' => 5,
        ]);

    }
}
