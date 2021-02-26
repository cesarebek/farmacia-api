<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $now = Carbon::now()->toDateTimeString();
        
        $categories = [
            ['name' => 'Parafarmacia', 'slug' => 'parafarmacia', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Integratori', 'slug' => 'integratori', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Cosmetica', 'slug' => 'cosmetica', 'created_at' => $now, 'updated_at' => $now]
        ];

        foreach($categories as $category){
            Category::create($category);
        }
    }
}
