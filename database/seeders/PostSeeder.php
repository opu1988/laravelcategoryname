<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\str;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Illuminate\Support\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Factory::create();

        for($i=0; $i<10; $i++) :
            $posts = [
                

                'title'     => $faker->realText(30),
                'slug'      => $faker->slug(),
                'excerpt'   => $faker->text(15),
                'content'   => $faker->paragraph(200),
                'thumbnail' => $faker->imageUrl(1000, 600),
                'user_id'   =>  $faker->numberBetween(1, 5),
                'category_id'   => $faker->numberBetween(1, 5),
                'created_at'    => Carbon::now()->format('Y-m-d h:i:s'),
                'updated_at'      => Carbon::now()->format('Y-m-d h:i:s'),
                'views'         => 100

                
            ];
            DB::table("posts")->insert($posts);

        endfor;
    }
}





