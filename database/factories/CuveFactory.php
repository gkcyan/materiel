<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cuve;
use Faker\Generator as Faker;

$factory->define(Cuve::class, function (Faker $faker) {

    return [
        'cuve' => $faker->word,
        'code' => $faker->word,
        'capacite' => $faker->word,
        'hauteur' => $faker->word,
        'station_id' => $faker->randomDigitNotNull,
        'produit_id' => $faker->randomDigitNotNull,
        'statut' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
