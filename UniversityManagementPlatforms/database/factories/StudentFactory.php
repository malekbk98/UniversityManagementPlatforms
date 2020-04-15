<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use App\User;
use App\Classe;


use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'classe_id' => Classe::get('id')->random(),
        'user_id' => User::get('id')->random(),
        'review' => $faker->randomDigitNot(5),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
