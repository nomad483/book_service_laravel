<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::query()->create([
            'customer_id' => 1,
            'order_date' => '2022-02-01',
            'total_amount' => 29.97,
        ]);

        Order::query()->create([
            'customer_id' => 2,
            'order_date' => '2022-02-15',
            'total_amount' => 44.97,
        ]);
    }
}
