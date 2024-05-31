<?php

use Illuminate\Database\Seeder;
use App\Models\EstablishmentType;
use Faker\Factory as Faker;

class EstablishmentTypeSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Types of establishments
        $types = ['Restaurant', 'Cafe', 'Hotel', 'Bar', 'Gym', 'Supermarket', 'Pharmacy', 'Salon', 'Bank', 'Hospital'];

        foreach ($types as $type) {
            EstablishmentType::create([
                'type' => $type,
            ]);
        }
    }
}
