<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $start = Carbon::create("2015", "1", "1");
    $end = Carbon::create("2020", "12", "31");
    $min = strtotime($start);
    $max = strtotime($end);
    $date = date('Y-m-d H:i:s', rand($min, $max));

    // シード値設定
    $faker->seed(1234);

    return [
        'name1' => $faker->lastName,
        'name2' => $faker->firstName,
        'kana1' => 'カナ',
        'kana2' => 'カナ',
        'gender_id' => random_int(1, 2),
        'password' => 'test',
        'email' => $faker->unique()->safeEmail,
        'prefecture_id' => random_int(1, 47),
        'created_at' => $date,
        'updated_at' => $date,
        // 'remember_token' => Str::random(10),
    ];
});
