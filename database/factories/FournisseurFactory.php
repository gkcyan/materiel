<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Fournisseur;
use Faker\Generator as Faker;

$factory->define(Fournisseur::class, function (Faker $faker) {

    return [
        'raison_so' => $faker->word,
        'compte_contr' => $faker->word,
        'reg_com' => $faker->word,
        'interlocuteur ' => $faker->word,
        'contact' => $faker->word,
        'email' => $faker->word,
        'statut' => $faker->randomDigitNotNull,
        'siege' => $faker->word,
        'observation' => $faker->word,
        'type_fournisseur_id' => $faker->randomDigitNotNull,
        'autor_creat' => $faker->word,
        'autor_update' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
