<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Liability;
use Faker\Generator as Faker;

$factory->define(Liability::class, function (Faker $faker) {

    return [
        'user_id' => $faker->word,
        'period_id' => $faker->word,
        'amount' => $faker->word,
        'due' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
