<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Period;
use Faker\Generator as Faker;

$factory->define(Period::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'method' => $faker->word,
        'amount' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
