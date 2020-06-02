<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\EnginKilometrage;
use Faker\Generator as Faker;

$factory->define(EnginKilometrage::class, function (Faker $faker) {

    return [
        'matricule_id' => $faker->randomDigitNotNull,
        'date' => $faker->word,
        'kilometrage' => $faker->word,
        'activite_id' => $faker->randomDigitNotNull,
        'statut_compteur' => $faker->randomDigitNotNull,
        'station_id' => $faker->randomDigitNotNull,
        'autor_creat' => $faker->word,
        'autor_update' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
