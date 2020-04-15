<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Teacher;
use App\User;

use Faker\Generator as Faker;

$factory->define(Teacher::class, function (Faker $faker) {
    return [
        'user_id' => User::get('id')->random(),
        'salary' => $faker->numberBetween($min = 1000, $max = 9000),
        'start_date' => $faker->date,
        'position' => $faker->jobTitle,
        'review' => $faker->randomDigitNot(5),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
