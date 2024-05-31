<?php

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use Faker\Factory as Faker;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $seniorCount = 500;
        $establishmentCount = 15;

        foreach (range(1, 1000) as $index) {
            $seniorId = $faker->numberBetween(1, $seniorCount);
            $establishmentId = $faker->numberBetween(1, $establishmentCount);
            $tellerId = $this->getRandomTellerIdForEstablishment($establishmentId);

            Transaction::create([
                'senior_id' => $seniorId,
                'establishment_id' => $establishmentId,
                'date' => $faker->date(),
                'teller_id' => $tellerId,
            ]);
        }
    }

    private function getRandomTellerIdForEstablishment($establishmentId)
    {
        $tellers = App\Models\Teller::where('establishment_id', $establishmentId)->pluck('id');
        return $tellers->random();
    }
}
