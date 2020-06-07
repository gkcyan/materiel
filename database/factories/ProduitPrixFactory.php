<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProduitPrix;
use Faker\Generator as Faker;

$factory->define(ProduitPrix::class, function (Faker $faker) {

    return [
        'produit_id' => $faker->randomDigitNotNull,
        'prix' => $faker->word,
        'debut' => $faker->word,
        'fin' => $faker->word,
        'statut' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
