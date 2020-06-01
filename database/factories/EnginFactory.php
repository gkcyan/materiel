<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Engin;
use Faker\Generator as Faker;

$factory->define(Engin::class, function (Faker $faker) {

    return [
        'marque_id' => $faker->randomDigitNotNull,
        'modele_id' => $faker->randomDigitNotNull,
        'matricule' => $faker->word,
        'type_id' => $faker->randomDigitNotNull,
        'code' => $faker->word,
        'energie_id' => $faker->randomDigitNotNull,
        'chassis' => $faker->word,
        'poids_vide' => $faker->word,
        'charge_utile' => $faker->word,
        'poids_charge' => $faker->word,
        'km_depart' => $faker->word,
        'couleur' => $faker->word,
        'essieux' => $faker->word,
        'places' => $faker->word,
        'usage' => $faker->word,
        'date_circ' => $faker->word,
        'nb_roue' => $faker->word,
        'statut' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
