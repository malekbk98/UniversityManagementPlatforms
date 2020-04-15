<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TeacherAttendance;
use App\Teacher;
use App\Lesson;

use Faker\Generator as Faker;

$factory->define(TeacherAttendance::class, function (Faker $faker) {
    return [
        'lesson_id' => Lesson::get('id')->random(),
        'teacher_id' => Teacher::get('id')->random(),
        'status' => $faker->word,
        'check_in' => now(),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
