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
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'US Dollars',
                'code' => '$',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Euros',
                'code' => '€',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
