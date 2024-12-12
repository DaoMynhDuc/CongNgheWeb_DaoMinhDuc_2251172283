<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class SalesTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $medicineIds = DB::table('medicines')->pluck('id');

        for ($i = 0; $i < 50; $i++) {
            DB::table('sales')->insert([
                'medicine_id' => $faker->randomElement($medicineIds),
                'quantity' => $faker->numberBetween(1, 100),
                'sale_date' => $faker->date(),
                'customer_phone' => $faker->unique()->phoneNumber(),
            ]);
        }
    }
}
