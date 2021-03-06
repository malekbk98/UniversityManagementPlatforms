<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Lesson;
use App\Subject;
use App\Classe;
use Faker\Generator as Faker;

$factory->define(Lesson::class, function (Faker $faker) {
    return [
        'subject_id' => Subject::get('id')->random(),
        'classe_id' => Classe::get('id')->random(),
        'classroom' => $faker->randomDigit,
        'start_time' => $faker->time,
        'end_time' => $faker->time,
        'week_day' => $faker->date,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
