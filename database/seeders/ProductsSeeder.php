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
                'stock' => 100,
                'product_image' => 'http://127.0.0.1:8000/storage/product_images/tachipirina_1613251939.jpeg'
            ],
            [
                'title' => 'Aspirina',
                'description' => 'Dolori alla testa',
                'price' => 9.90,
                'stock' => 100,
                'product_image' => 'http://127.0.0.1:8000/storage/product_images/aspirina_1613251862.jpg'
            ],
        ];

        foreach($products as $product){
            Product::create($product);
        }
    }
}
