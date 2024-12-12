<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MedicinesTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            DB::table('medicines')->insert([
                'name' => $faker->word,
                'brand' => $faker->company,
                'dosage' => $faker->randomElement(['10mg','50mg','100mg']),
                'form' => $faker->randomElement(['Viên Nang','Viên Nén','Xi-rô']),
                'price' => $faker->randomFloat(2, 1000, 100000),
                'stock' => $faker->numberBetween(0, 100),
            ]);
        }
    }
}
