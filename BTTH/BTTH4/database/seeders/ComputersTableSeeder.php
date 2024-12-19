<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ComputersTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) { // Tạo 10 máy tính
            DB::table('computers')->insert([
                'computer_name' => 'Lab' . $faker->numberBetween(1, 9) . '-PC' . $faker->numberBetween(1, 20),
                'model' => $faker->word . ' ' . $faker->numberBetween(1000, 9999),
                'operating_system' => $faker->randomElement(['Windows 10 Pro', 'Ubuntu 20.04', 'macOS Monterey']),
                'processor' => $faker->randomElement(['Intel Core i5-11400', 'AMD Ryzen 5 5600X', 'Intel Core i7-10700']),
                'memory' => $faker->randomElement([8, 16, 32]),
                'available' => $faker->boolean,
            ]);
        }
    }
}