<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
        //Calls other seeders
        $this->call([
            ProductsSeeder::class,
            AdminSeeder::class
        ]);
    }
}
