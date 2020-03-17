<?php

use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periods')->insert([
            [
                'name' => 'Daily',
                'method' => 'days',
                'amount' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Weekly',
                'method' => 'days',
                'amount' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Monthly',
                'method' => 'months',
                'amount' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Quarterly',
                'method' => 'months',
                'amount' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Annual',
                'method' => 'years',
                'amount' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
