<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Income;
use Faker\Generator as Faker;

$factory->define(Income::class, function (Faker $faker) {

    return [
        'user_id' => $faker->word,
        'currency_id' => $faker->word,
        'dayofmonth' => $faker->randomDigitNotNull,
        'name' => $faker->word,
        'amount' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
