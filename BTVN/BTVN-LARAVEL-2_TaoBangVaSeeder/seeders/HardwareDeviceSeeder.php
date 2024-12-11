<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class HardwareDeviceSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $centerIds = DB::table('it_centers')->pluck('id');

        for ($i = 0; $i < 20; $i++) {
            DB::table('hardware_devices')->insert([
                'device_name' => $faker->word,
                'type' => $faker->randomElement(['Mouse', 'Keyboard', 'Headset']),
                'status' => $faker->boolean,
                'center_id' => $faker->randomElement($centerIds),
            ]);
        }
    }
}
