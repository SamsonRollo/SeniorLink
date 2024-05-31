<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use App\Models\Town;
use Faker\Factory as Faker;

class TownSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Town::create([
                'name' => $faker->city,
                'administrator' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'zip_code' => $faker->postcode,
                'password' => Hash::make('123'),
                'time_created' => Date::now(),
                'official_seal' => null,
            ]);
        }
    }
}
