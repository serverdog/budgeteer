<?php

use Illuminate\Database\Seeder;

class BillItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bill_items')->insert([
            [
                'name' => 'Mortgage / Rent',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Council Tax',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Water',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Gas',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Electricity',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Gas & Electricity',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Home Phone',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Broadband',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Home Phone & Broadband',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Mobile Phone(s)',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'TV subscriptions',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'TV Licence',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Home & Contents Insurance',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Food delivery subscription',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
