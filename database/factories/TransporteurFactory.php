<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Transporteur;
use Faker\Generator as Faker;

$factory->define(Transporteur::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'libelle' => $faker->word,
        'compte_cont' => $faker->word,
        'reg_com' => $faker->word,
        'interlocuteur' => $faker->word,
        'interlo_cont' => $faker->word,
        'interlo_email' => $faker->word,
        'type' => $faker->word,
        'statut' => $faker->word
    ];
});
