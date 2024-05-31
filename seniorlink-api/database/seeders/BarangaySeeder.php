<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barangay;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class BarangaySeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            Barangay::create([
                'name' => $faker->city,
                'administrator' => $faker->name,
                'town_id' => $faker->numberBetween(1, 10), // Assuming there are 10 towns
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('123'),
                'official_seal_path' => null,
            ]);
        }
    }
}
