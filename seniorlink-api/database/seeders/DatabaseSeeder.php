<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seed in sequence
        $this->call(TownSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(BarangaySeeder::class);
        $this->call(EstablishmentTypeSeeder::class);
        $this->call(EstablishmentSeeder::class);
        $this->call(TellerSeeder::class);
        $this->call(SeniorSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(ProductTransactionSeeder::class);
    }
}