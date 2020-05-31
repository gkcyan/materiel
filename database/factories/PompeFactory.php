<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pompe;
use Faker\Generator as Faker;

$factory->define(Pompe::class, function (Faker $faker) {

    return [
        'pompe' => $faker->word,
        'marque' => $faker->word,
        'code' => $faker->word,
        'index_depart' => $faker->word,
        'station_id' => $faker->randomDigitNotNull,
        'produit_id' => $faker->randomDigitNotNull,
        'cuve_id' => $faker->randomDigitNotNull,
        'statut' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
