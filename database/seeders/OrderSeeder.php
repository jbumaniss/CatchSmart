<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'partner_id' => 1,
            'product_id' => 1,
            'warehouse_id' => 1,
            'name' => 'Change oil',
            'type' => 'Service',
            'price' => 99.99,
            'description' => 'This is oil change'
        ]);

        Order::create([
            'partner_id' => 1,
            'product_id' => 3,
            'warehouse_id' => 1,
            'name' => 'Oil',
            'type' => 'Product',
            'price' => 9.99,
            'description' => 'This is oil',
            'quantity' => 50
        ]);
    }
}
