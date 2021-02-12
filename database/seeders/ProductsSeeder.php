<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Default products
        $products = [
            [
                'title' => 'Tachipirina',
                'description' => 'Dolori alla testa',
                'price' => 9.90,
                'stock' => 100
            ],
            [
                'title' => 'Aspirina',
                'description' => 'Dolori alla testa',
                'price' => 9.90,
                'stock' => 100
            ],
        ];

        foreach($products as $product){
            Product::create($product);
        }
    }
}
