<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Classe;
use App\Department;
use Faker\Generator as Faker;

$factory->define(Classe::class, function (Faker $faker) {
    return [
        'classe_name' => $faker->word,
        'department_id' => Department::get('id')->random(),
        'specialite' => $faker->word,
        'created_at' => now(),
        'updated_at' => now(),
    
    ];
});
