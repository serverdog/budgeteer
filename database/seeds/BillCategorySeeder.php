<?php

use Illuminate\Database\Seeder;

class BillCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bill_categories')->insert([
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
                'name' => 'Mobile / cellular phone contract',
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
                'name' => 'Insurance (Home / Contents)',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Insurance (Car / bike)',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Insurance (Life)',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Insurance (Health)',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Insurance (Medical)',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Insurance (Other)',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Food delivery subscription',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Cloud subscription',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Car Finance',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Loan repayment',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
