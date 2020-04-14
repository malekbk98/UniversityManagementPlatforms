<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Departement;
use Faker\Generator as Faker;

$factory->define(Departement::class, function (Faker $faker) {
    return [
        'departement_name' => $faker->subject,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
