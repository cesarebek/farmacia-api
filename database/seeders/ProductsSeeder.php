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
        //Prodotti Parafarmacia
        $products = [
            [
                'title' => 'Tachipirina',
                'description' => 'Dolori alla testa',
                'price' => 13.90,
                'stock' => 100,
                'product_image' => 'http://127.0.0.1:8000/storage/product_images/tachipirina_1613251939.jpeg',
                'category_id' => 1
                
            ],
            [
                'title' => 'Aspirina',
                'description' => 'Dolori alla testa',
                'price' => 9.90,
                'stock' => 100,
                'product_image' => 'http://127.0.0.1:8000/storage/product_images/aspirina_1613251862.jpg',
                'category_id' => 1
            ],
            [
                'title' => 'Vitarmonyl - Fermenti Lattici',
                'description' => 'Equilibrio flor intestinale',
                'price' => 5.90,
                'stock' => 100,
                'product_image' => 'http://127.0.0.1:8000/storage/product_images/aspirina_1613251862.jpg',
                'category_id' => 1
            ],
            [
                'title' => 'POST-FLUDEC',
                'description' => 'Multivitaminico contro la spossatezza, recupero immediato.',
                'price' => 9.90,
                'stock' => 100,
                'product_image' => 'http://127.0.0.1:8000/storage/product_images/aspirina_1613251862.jpg',
                'category_id' => 2
            ],
            [
                'title' => 'Multicentrum',
                'description' => 'Multicentrum Vitamine e Minerali offre un apporto nutrizionale equilibrato per adulti e bambini di età superiore ai 12 anni: questo integratore alimentare aiuterà il normale funzionamento del tuo corpo.',
                'price' => 24.80,
                'stock' => 100,
                'product_image' => 'http://127.0.0.1:8000/storage/product_images/aspirina_1613251862.jpg',
                'category_id' => 2
            ],
            [
                'title' => 'Enterolactis Plus',
                'description' => 'Un autentico probiotico, capace di ripristinare realmente ed in sicurezza il livello fisiologico della flora enterica alterata dalle cause più diverse',
                'price' => 19.90,
                'stock' => 100,
                'product_image' => 'http://127.0.0.1:8000/storage/product_images/aspirina_1613251862.jpg',
                'category_id' => 2
            ],
            [
                'title' => 'Vitamina C',
                'description' => '90 compresse multivitaminiche per uomini e donne',
                'price' => 12.50,
                'stock' => 100,
                'product_image' => 'http://127.0.0.1:8000/storage/product_images/aspirina_1613251862.jpg',
                'category_id' => 1
            ],
        ];
        //Attaching category for Parafarmacia products
        foreach($products as $product){
            Product::create($product);
        }
    }
}
