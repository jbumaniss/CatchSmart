<?php

namespace Database\Seeders;


use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Change oil',
        'type' => 'Service',
        'type_id' => 2,
        'warehouse_id' => 1,
        'price' => 99.99,
        'description' => 'This is oil change'
        ]);

        Product::create([
            'name' => 'Server clean',
            'type' => 'Service',
            'type_id' => 2,
            'warehouse_id' => 1,
            'price' => 50.99,
            'description' => 'This is server cleaning'
        ]);

        Product::create([
            'name' => 'Oil',
            'type' => 'Product',
            'type_id' => 1,
            'warehouse_id' => 1,
            'price' => 9.99,
            'description' => 'This is oil',
            'quantity' => 50
        ]);
    }
}
