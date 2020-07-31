<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Coupon;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Coupon::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 2, $variableNbSentences = true),
        'content' => $faker->realText($maxNbChars = 140),
        'expiration_date' => $faker->dateTimeThisMonth,
        'updated_at' => $faker->dateTimeThisYear,
        'created_at' => $faker->dateTimeThisYear,
    ];
});
