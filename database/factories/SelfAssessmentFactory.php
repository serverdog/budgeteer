<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SelfAssessment;
use Faker\Generator as Faker;

$factory->define(SelfAssessment::class, function (Faker $faker) {

    return [
        'user_id' => $faker->word,
        'year' => $faker->word,
        'name' => $faker->word,
        'total_dividends' => $faker->word,
        'share' => $faker->word,
        'salary' => $faker->word,
        'savings' => $faker->word,
        'other' => $faker->word,
        'july_payment' => $faker->word,
        'active' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
