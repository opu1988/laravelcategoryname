<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\str;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $faker = Factory::create();
        for($i=0; $i<5; $i++) :
            $categories = [
                

                'name'     => $faker->country(),
                'slug'      => $faker->slug(),

                
            ];
            DB::table("categories")->insert($categories);

        endfor;
    }
}
