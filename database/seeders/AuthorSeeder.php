<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::query()->create([
            'name' => 'John Doe',
            'bio' => 'John Doe is a renowned author with several best-selling books.',
        ]);

        Author::query()->create([
            'name' => 'Jane Smith',
            'bio' => 'Jane Smith is a prolific writer known for her compelling novels.',
        ]);
    }
}
