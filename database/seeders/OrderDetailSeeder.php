<?php

namespace Database\Seeders;

use App\Models\OrderDetail;
use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderDetail::query()->create([
            'order_id' => 1,
            'book_id' => 1,
            'quantity' => 2,
            'price_per_unit' => 9.99,
        ]);

        OrderDetail::query()->create([
            'order_id' => 1,
            'book_id' => 2,
            'quantity' => 1,
            'price_per_unit' => 14.99,
        ]);
    }
}
