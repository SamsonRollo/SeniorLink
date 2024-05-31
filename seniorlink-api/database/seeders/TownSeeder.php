<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Town;
use Faker\Factory as Faker;

class TownSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        
        foreach (range(1, 10) as $index) {

            $zipCode = '';
            $uniqueZipCode = false;

            while (!$uniqueZipCode) {
                $zipCode = $faker->numberBetween(1000, 9999);

                if (!Town::where('zip_code', $zipCode)->exists()) {
                    $uniqueZipCode = true;
                }
            }

            Town::create([
                'name' => $faker->city,
                'administrator' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'zip_code' => $zipCode,
                'password' => Hash::make('123'),
                'official_seal_path' => null,
            ]);
        }
    }
}
