<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Subject;
use App\Teacher;
use Faker\Generator as Faker;

$factory->define(Subject::class, function (Faker $faker) {
    return [
        'teacher_id' => Teacher::get('id')->random(),
        'subject_name' => $faker->sentence,
        'subject_cof' => $faker->randomFloat(10, 1, 10),
        'subject_max_abs' => $faker->randomDigitNot(5),
        'subject_type' => $faker->word,
        'total_review' => $faker->randomDigitNot(5),
        'nbr_review' => $faker->randomDigitNot(5),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
