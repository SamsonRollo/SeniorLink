<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductTransaction;
use App\Models\Transaction;
use App\Models\Products;
use Illuminate\Support\Collection;
use Faker\Factory as Faker;

class ProductTransactionSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $transactions = Transaction::pluck('id');
        $products = Products::pluck('id');

        foreach ($transactions as $transactionId) {
            $productsCount = $faker->numberBetween(1, 7);
            $randomProducts = $this->getRandomProducts($products, $productsCount);
            $existingProducts = ProductTransaction::whereIn('products_id', $randomProducts)->pluck('products_id');
            $newProducts = $randomProducts->diff($existingProducts);

            foreach ($newProducts as $productId) {
                ProductTransaction::create([
                    'transaction_id' => $transactionId,
                    'products_id' => $productId,
                ]);
            }
        }
    }

    private function getRandomProducts(Collection $products, $count)
    {
        return $products->shuffle()->take($count);
    }
}
