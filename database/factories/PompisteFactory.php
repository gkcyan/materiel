<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pompiste;
use Faker\Generator as Faker;

$factory->define(Pompiste::class, function (Faker $faker) {

    return [
        'nom' => $faker->word,
        'prenom' => $faker->word,
        'contact' => $faker->word,
        'station_id' => $faker->randomDigitNotNull,
        'emploi' => $faker->randomDigitNotNull,
        'contrat' => $faker->randomDigitNotNull,
        'code' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
