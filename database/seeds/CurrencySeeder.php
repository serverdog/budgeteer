<?php

use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
            [
                'name' => 'Pounds',
                'code' => '£',
                'iso'   => 'GBP',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'US Dollars',
                'code' => '$',
                'iso'   => 'USD',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Aus Dollars',
                'code' => '$',
                'iso'   => 'AUD',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Euros',
                'code' => '€',
                'iso'   => 'EUR',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
