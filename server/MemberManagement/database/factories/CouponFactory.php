<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Coupon;
use Faker\Generator as Faker;
use Carbon\Carbon;


$factory->define(Coupon::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'content' => $faker->text,
        'expiration_date' => $faker->dateTimeThisMonth,
        'updated_at' => $faker->dateTimeThisYear,
        'created_at' => $faker->dateTimeThisYear,
    ];
});
