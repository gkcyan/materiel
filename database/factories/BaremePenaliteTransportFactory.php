<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BaremePenaliteTransport;
use Faker\Generator as Faker;

$factory->define(BaremePenaliteTransport::class, function (Faker $faker) {

    return [
        'freinte' => $faker->randomDigitNotNull,
        'prix_aiph' => $faker->randomDigitNotNull,
        'coef' => $faker->randomDigitNotNull,
        'penalite_tonne' => $faker->randomDigitNotNull,
        'debut' => $faker->word,
        'fin' => $faker->word,
        'statut' => $faker->randomDigitNotNull,
        'autor_creat' => $faker->word,
        'autor_update' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
