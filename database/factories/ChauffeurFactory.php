<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Chauffeur;
use Faker\Generator as Faker;

$factory->define(Chauffeur::class, function (Faker $faker) {

    return [
        'photo' => $faker->word,
        'nom' => $faker->word,
        'prenom' => $faker->word,
        'contact' => $faker->word,
        'entreprise_id' => $faker->randomDigitNotNull,
        'contrat' => $faker->randomDigitNotNull,
        'date_contrat' => $faker->date('Y-m-d H:i:s'),
        'date_naissance' => $faker->date('Y-m-d H:i:s'),
        'lieu_naissance' => $faker->word,
        'ethnie' => $faker->word,
        'religion' => $faker->word,
        'sit_maritale' => $faker->word,
        'groupe_sang' => $faker->word,
        'nb_enfant' => $faker->word,
        'cni_ref' => $faker->word,
        'permis_ref' => $faker->word,
        'residence' => $faker->word,
        'code' => $faker->word,
        'autor_creat' => $faker->word,
        'autor_update' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
