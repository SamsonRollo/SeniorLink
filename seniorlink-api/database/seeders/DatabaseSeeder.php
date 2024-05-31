<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\TownSeeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\BarangaySeeder;
use Database\Seeders\EstablishmentTypeSeeder;
use Database\Seeders\EstablishmentSeeder;
use Database\Seeders\TellerSeeder;
use Database\Seeders\SeniorSeeder;
use Database\Seeders\TransactionSeeder;
use Database\Seeders\ProductsSeeder;
use Database\Seeders\ProductTransactionSeeder;

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