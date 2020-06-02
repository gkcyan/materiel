<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Activite;
use Faker\Generator as Faker;

$factory->define(Activite::class, function (Faker $faker) {

    return [
        'process_id' => $faker->randomDigitNotNull,
        'activite' => $faker->word,
        'statut' => $faker->randomDigitNotNull,
        'finalite' => $faker->text,
        'pilote' => $faker->word,
        'controleur' => $faker->word,
        'code' => $faker->word,
        'autor_creat' => $faker->word,
        'autor_update' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
