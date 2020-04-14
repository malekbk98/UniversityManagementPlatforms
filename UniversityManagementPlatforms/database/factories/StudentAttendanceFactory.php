<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\StudentAttendance;
use Faker\Generator as Faker;

$factory->define(StudentAttendance::class, function (Faker $faker) {
    return [
        'lesson_id' => Lesson::get('id')->random(),
        'student_id' => Student::get('id')->random(),
        'status' => $faker->word,
        'check_in' => $faker->time,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
