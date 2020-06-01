<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\EnginModele;
use Faker\Generator as Faker;

$factory->define(EnginModele::class, function (Faker $faker) {

    return [
        'modele' => $faker->word,
        'code' => $faker->word,
        'marque_id' => $faker->randomDigitNotNull,
        'annee' => $faker->word,
        'statut' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
