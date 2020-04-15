<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Classe;
use App\Departement;
use Faker\Generator as Faker;

$factory->define(Classe::class, function (Faker $faker) {
    return [
        'classe_name' => $faker->word,
        'departement_id' => Departement::get('id')->random(),
        'specialite' => $faker->word,
        'created_at' => now(),
        'updated_at' => now(),
    
    ];
});
