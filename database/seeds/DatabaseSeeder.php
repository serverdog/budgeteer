<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([CurrencySeeder::class]);
        $this->call([AccountCategorySeeder::class]);
        $this->call([AccountTypeSeeder::class]);
        $this->call([PeriodSeeder::class]);
        $this->call([UsersTableSeeder::class]);
    }
}
