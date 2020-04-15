<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use App\StudentAttendance;
use App\Subject;
use App\Lesson;


use Faker\Generator as Faker;

$factory->define(StudentAttendance::class, function (Faker $faker) {
    return [
        'lesson_id' => Lesson::get('id')->random(),
        'student_id' => Student::get('id')->random(),
        'status' => $faker->word,
        'check_in' => now(),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
