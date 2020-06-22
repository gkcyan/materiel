<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Accompte;
use Faker\Generator as Faker;

$factory->define(Accompte::class, function (Faker $faker) {

    return [
        'type_accompte_id' => $faker->randomDigitNotNull,
        'fournisseur_id' => $faker->randomDigitNotNull,
        'description' => $faker->text,
        'Montant' => $faker->randomDigitNotNull,
        'date' => $faker->word,
        'caisse' => $faker->word,
        'caissier' => $faker->word,
        'recup_par' => $faker->word,
        'autor_creat' => $faker->word,
        'autor_update' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
