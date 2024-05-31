<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teller;
use Faker\Factory as Faker;

class TellerSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 40) as $index) {
            Teller::create([
                'name' => $faker->name,
                'birthdate' => $faker->date(),
                'address' => $faker->address,
                'tin' => $faker->numerify('##########'),
                'establishment_id' => $faker->numberBetween(1, 15),
                'profile_image_path' => null,
            ]);
        }
    }
}
