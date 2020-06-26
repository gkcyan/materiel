<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Facture;
use Faker\Generator as Faker;

$factory->define(Facture::class, function (Faker $faker) {

    return [
        'fournisseur_id' => $faker->randomDigitNotNull,
        'reference' => $faker->word,
        'description' => $faker->word,
        'date' => $faker->word,
        'statut' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
