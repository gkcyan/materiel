<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\VentePetrolier;
use Faker\Generator as Faker;

$factory->define(VentePetrolier::class, function (Faker $faker) {

    return [
        'marque_id' => $faker->randomDigitNotNull,
        'matricule_id' => $faker->randomDigitNotNull,
        'transporteur_id' => $faker->randomDigitNotNull,
        'produit_id' => $faker->randomDigitNotNull,
        'quantite' => $faker->word,
        'date' => $faker->word,
        'chauffeur_id' => $faker->randomDigitNotNull,
        'activite_id' => $faker->randomDigitNotNull,
        'kilometrage' => $faker->word,
        'statut_compteur' => $faker->randomDigitNotNull,
        'pompiste_id' => $faker->randomDigitNotNull,
        'pompe_id' => $faker->randomDigitNotNull,
        'station_id' => $faker->randomDigitNotNull,
        'autor_creat' => $faker->word,
        'autor_update' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
