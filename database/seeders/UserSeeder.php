<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $faker = \Faker\Factory::create();

        for($i=0; $i<5; $i++){


            DB::table('users')->insert([


                'name'          => $faker->name(),
                'username'      => $faker->userName(),
                'email'         => $faker->safeEmail(),
                'password'      => Hash::make("pass123")
            ]);
        }

       
    }
}

