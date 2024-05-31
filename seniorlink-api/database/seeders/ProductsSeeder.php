<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Products;
use Faker\Factory as Faker;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 5000) as $index) {
            Products::create([
                'name' => $faker->word,
                'quantity' => $faker->numberBetween(1, 30),
                'price' => $faker->randomFloat(2, 1, 100),
            ]);
        }
    }
}
