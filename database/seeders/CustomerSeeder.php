<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::query()->create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'address' => '123 Main Street',
            'user_id'=> 1,
        ]);

        Customer::query()->create([
            'name' => 'Jane Smith',
            'email' => 'janesmith@example.com',
            'address' => '456 Elm Street',
            'user_id' => 2,
        ]);
    }
}
