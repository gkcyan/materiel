<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BaremeTransport;
use Faker\Generator as Faker;

$factory->define(BaremeTransport::class, function (Faker $faker) {

    return [
        'origine_id' => $faker->randomDigitNotNull,
        'destination_id' => $faker->randomDigitNotNull,
        'distance' => $faker->word,
        'cout' => $faker->word,
        'observation' => $faker->word,
        'autor_creat' => $faker->word,
        'autor_update' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
