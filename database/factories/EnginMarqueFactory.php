<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\EnginMarque;
use Faker\Generator as Faker;

$factory->define(EnginMarque::class, function (Faker $faker) {

    return [
        'marque' => $faker->word,
        'code' => $faker->word,
        'statut' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
