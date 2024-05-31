<?php

use Illuminate\Database\Seeder;
use App\Models\Senior;
use Faker\Factory as Faker;

class SeniorSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $barangayCount = 100;

        foreach (range(1, 500) as $index) {
            $barangay = App\Models\Barangay::find($faker->numberBetween(1, $barangayCount));
            $zipcode = $barangay->town->zip_code;
            $osca_id = $faker->unique()->ean13;
            $username = 's' . $zipcode . $osca_id;

            $senior = Senior::create([
                'osca_id' => $osca_id,
                'fname' => $faker->firstName,
                'mname' => $faker->lastName,
                'lname' => $faker->lastName,
                'barangay_id' => $barangay->id,
                'birthdate' => $faker->date(),
                'contact_number' => $faker->numerify('0##########'),
                'username' => $username,
                'profile_image' => null,
            ]);
        }
    }
}
