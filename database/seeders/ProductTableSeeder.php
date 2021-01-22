<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Models\Product([
            'name' => 'Laptop',
            'description' => 'unitate de procesare portanila',
            'price' => 2099.99,
            'quantity' => 50
        ]);
        $product->save();

        $product = new \App\Models\Product([
            'name' => 'Tastatura',
            'description' => 'cu taste',
            'price' => 89.99,
            'quantity' => 100
        ]);
        $product->save();

        $product = new \App\Models\Product([
            'name' => 'Mouse',
            'description' => 'fara fir',
            'price' => 49.99,
            'quantity' => 100
        ]);
        $product->save();

        $product = new \App\Models\Product([
            'name' => 'Monitor',
            'description' => '4k',
            'price' => 349.99,
            'quantity' => 80
        ]);
        $product->save();

        $product = new \App\Models\Product([
            'name' => 'Casti',
            'description' => 'cu fir',
            'price' => 159.99,
            'quantity' => 50
        ]);
        $product->save();
    }
}
