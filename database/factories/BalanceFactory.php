<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Balance;
use Faker\Generator as Faker;

$factory->define(Balance::class, function (Faker $faker) {

    return [
        'user_id' => $faker->word,
        'account_id' => $faker->word,
        'accounttype_id' => $faker->word,
        'currency_id' => $faker->word,
        'date' => $faker->word,
        'amount' => $faker->word,
        'latest' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
