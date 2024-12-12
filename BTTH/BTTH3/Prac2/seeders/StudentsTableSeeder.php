<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $classIds = DB::table('classes')->pluck('id');
        for ($i = 0; $i < 50; $i++) { 
            DB::table('students')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $faker->date('Y-m-d', '2018-12-31'), 
                'parent_phone' => $faker->unique()->phoneNumber(),
                'class_id' => $faker->randomElement($classIds),
            ]);
        }
    }
}

