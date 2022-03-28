<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::factory()
            ->count(50)
            ->create();
        Transaction::factory()
            ->create([
                'category' => Transaction::CATEGORY_INCOME,
                'amount' => 500
            ]);
        Transaction::factory()
            ->count(50)
            ->create();
        Transaction::factory()
            ->create([
                'category' => Transaction::CATEGORY_INCOME,
                'amount' => 500
            ]);
    }
}
