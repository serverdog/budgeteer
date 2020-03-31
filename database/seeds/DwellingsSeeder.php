<?php

use Illuminate\Database\Seeder;

class DwellingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dwellings')->insert([
            [
                'name' => '1 or 2 bedroom house / flat',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => '3 or 4 bedroom house / flat',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => '5+ bedroom house / flat',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
