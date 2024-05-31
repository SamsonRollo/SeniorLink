<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Establishment;
use Illuminate\Support\Facades\Date;
use Faker\Factory as Faker;

class EstablishmentSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 15) as $index) {
            Establishment::create([
                'name' => $faker->company,
                'code' => $faker->unique()->ean8,
                'email' => $faker->unique()->safeEmail,
                'bir_id' => $faker->unique()->ean13,
                'owner_name' => $faker->name,
                'owner_tin' => $faker->numerify('##########'),
                'establishment_type_id' => $faker->numberBetween(1, 10), // based on establishmenttypeseeder
                'address' => $faker->address,
                'password' => Hash::make('123'),
                'logo' => null,
                'time_created' => Date::now(),
            ]);
        }
    }
}
