<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ZoneCollecte;
use Faker\Generator as Faker;

$factory->define(ZoneCollecte::class, function (Faker $faker) {

    return [
        'zone' => $faker->word,
        'code_zone' => $faker->word,
        'type_zone_id' => $faker->randomDigitNotNull,
        'rayon' => $faker->word,
        'gps_coord' => $faker->word,
        'observation' => $faker->word,
        'autor_creat' => $faker->word,
        'autor_update' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
