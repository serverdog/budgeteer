<?php

use Illuminate\Database\Seeder;

class AccountCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account_categories')->insert([
            [
                'name' => 'Instant Funds',
                'description' => "Funds that you have immediate access to, including current accounts & instant access savings accounts",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Stashed Cash',
                'description' => "Funds that you have quick but not instant access to, for example funds that will reach your current account tomorrow or in a few days if moved today.",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Long Term Savings',
                'description' => "Funds that are locked away without immediate access, for example regular savings account, ISAs and investments.",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Short Term Liabilities',
                'description' => "Bills, Card Debt, Store Cards and similar monthly debts",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Long Term Liabilities',
                'description' => "Accounts where you have taken a loan, finance or are in debt to another person or company that run for many years.",
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
