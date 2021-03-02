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
                'product_image' => 'http://127.0.0.1:8000/storage/product_images/tachipirina.jpg',
                'category_id' => 1
                
            ],
            [
                'title' => 'Viks',
                'description' => 'Raffreddore? Naso chiuso? VIKS VapoRub è ciò che fa per te. Liberati dal malessere!',
                'price' => 8.90,
                'stock' => 100,
                'product_image' => 'http://127.0.0.1:8000/storage/product_images/vicks.jpg',
                'category_id' => 1
                
            ],
            [
                'title' => 'Voltaren Emulgel',
                'description' => 'Crema sfiammante ideale per dolori muscolari o artrite. Con pratico dosatore + massaggiatore.',
                'price' => 16.90,
                'stock' => 100,
                'product_image' => 'http://127.0.0.1:8000/storage/product_images/voltaren.jpg',
                'category_id' => 1
                
            ],
            [
                'title' => 'Propoli Spry',
                'description' => 'Spry a base di miele di Manuka, gusto limone. Ed il mal di gola lo dimentichi.',
                'price' => 16.90,
                'stock' => 100,
                'product_image' => 'http://127.0.0.1:8000/storage/product_images/propoli.jpg',
                'category_id' => 1
                
            ],
            [
                'title' => 'Tantum Verder Gola',
                'description' => 'Spry per mucosa orale al gusto camomilla e miele.',
                'price' => 7.90,
                'stock' => 100,
                'product_image' => 'http://127.0.0.1:8000/storage/product_images/tantum-verde.jpg',
                'category_id' => 1
                
            ],
            [
                'title' => 'Aspirina',
                'description' => 'Dolori alla testa',
                'price' => 9.90,
                'stock' => 100,
                'product_image' => 'http://127.0.0.1:8000/storage/product_images/aspirina.jpg',
                'category_id' => 1
            ],
            [
                'title' => 'Vitarmonyl - Fermenti Lattici',
                'description' => 'Equilibrio flor intestinale',
                'price' => 5.90,
                'stock' => 100,
                'product_image' => 'http://127.0.0.1:8000/storage/product_images/vitarmonyl.png',
                'category_id' => 1
            ],
            [
                'title' => 'POST-FLUDEC',
                'description' => 'Multivitaminico contro la spossatezza, recupero immediato.',
                'price' => 9.90,
                'stock' => 100,
                'product_image' => 'http://127.0.0.1:8000/storage/product_images/post-fludec.jpeg',
                'category_id' => 1
            ],
            [
                'title' => 'Multicentrum',
                'description' => 'Multicentrum Vitamine e Minerali offre un apporto nutrizionale equilibrato per adulti e bambini di età superiore ai 12 anni: questo integratore alimentare aiuterà il normale funzionamento del tuo corpo.',
                'price' => 24.80,
                'stock' => 100,
                'product_image' => 'http://127.0.0.1:8000/storage/product_images/multicentrum.jpg',
                'category_id' => 2
            ],
            [
                'title' => 'Enterolactis Plus',
                'description' => 'Un autentico probiotico, capace di ripristinare realmente ed in sicurezza il livello fisiologico della flora enterica alterata dalle cause più diverse',
                'price' => 19.90,
                'stock' => 100,
                'product_image' => 'http://127.0.0.1:8000/storage/product_images/enterolactis-plus.jpg',
                'category_id' => 2
            ],
            [
                'title' => 'Multicentrum Uomo',
                'description' => '90 compresse multivitaminiche per uomini e donne',
                'price' => 12.50,
                'stock' => 100,
                'product_image' => 'http://127.0.0.1:8000/storage/product_images/multicentrum-uomo.jpg',
                'category_id' => 2
            ],
            [
                'title' => 'Multicentrum Donna',
                'description' => '90 compresse multivitaminiche per uomini e donne',
                'price' => 12.50,
                'stock' => 100,
                'product_image' => 'http://127.0.0.1:8000/storage/product_images/multicentrum-donna.jpg',
                'category_id' => 2
            ],
            [
                'title' => 'Multicentrum Junior',
                'description' => '90 compresse multivitaminiche per uomini e donne',
                'price' => 12.50,
                'stock' => 100,
                'product_image' => 'http://127.0.0.1:8000/storage/product_images/multicentrum-junior.jpg',
                'category_id' => 2
            ],
            //Cosmesi
             [
                'title' => 'Everyuth - Exfolianting Scrub',
                'description' => 'Ottimo per la rimozione di punti neri e pelle secca.',
                'price' => 16.40,
                'stock' => 100,
                'product_image' => 'http://127.0.0.1:8000/storage/product_images/esfoliante.jpg',
                'category_id' => 3
            ],
             [
                'title' => 'Nivea - Struccante Bifasico',
                'description' => 'Struccante occhi doppia azione, ideale per trucco waterproof.',
                'price' => 9.70,
                'stock' => 100,
                'product_image' => 'http://127.0.0.1:8000/storage/product_images/struccante.png',
                'category_id' => 3
            ],
             [
                'title' => 'Zaffiro Organica - Contorno Occhi',
                'description' => 'Contorno occhi di origine naturale, soluzione concentrata per tutti i tipi di pelle.',
                'price' => 14.90,
                'stock' => 100,
                'product_image' => 'http://127.0.0.1:8000/storage/product_images/contorno-occhi.jpg',
                'category_id' => 3
            ],
             [
                'title' => 'Garnier Acqua Micellare',
                'description' => 'Una formula speciale che strucca, purifica ed equlilibra la pelle senza risciaquo.',
                'price' => 7.90,
                'stock' => 100,
                'product_image' => 'http://127.0.0.1:8000/storage/product_images/acqua-micellare.png',
                'category_id' => 3
            ],
             [
                'title' => 'Garnier - Olio Dolce',
                'description' => 'Un olio originale Garnier con base di olio di Argan e di Camelia. Nutre, Protegge, Sublima. Ottimo per capelli secchi, spenti.',
                'price' => 24.90,
                'stock' => 100,
                'product_image' => 'http://127.0.0.1:8000/storage/product_images/olio-dolce.png',
                'category_id' => 3
            ],
             [
                'title' => 'OMIA - Maschera Capelli Argan',
                'description' => "Una maschera innovativa per capelli a base di olio d'Argan",
                'price' => 5.90,
                'stock' => 100,
                'product_image' => 'http://127.0.0.1:8000/storage/product_images/maschera-capelli.jpg',
                'category_id' => 3
            ],
             [
                'title' => 'Kerastase - Cheratina',
                'description' => "Proteggete i vostri capelli dal caldo e dall'umidità, riparando contemporaneamente le ciocche, con la crema termica Kérastase Discipline Keratin.",
                'price' => 41.90,
                'stock' => 100,
                'product_image' => 'http://127.0.0.1:8000/storage/product_images/cheratina.jpg',
                'category_id' => 3
            ],
        ];
        //Attaching category for Parafarmacia products
        foreach($products as $product){
            Product::create($product);
        }
    }
}
