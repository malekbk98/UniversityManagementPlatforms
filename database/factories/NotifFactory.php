<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Notif;
use App\User;
use Faker\Generator as Faker;

$factory->define(Notif::class, function (Faker $faker) {
    return [
        'user_id' => User::get('id')->random(),
        'title' => $faker->sentence,
        'message' => $faker->sentence,
        'status' => $faker->sentence,
        'created_at' => now(),        
    ];
});
