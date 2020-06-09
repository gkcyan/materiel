<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Bascule;
use Faker\Generator as Faker;

$factory->define(Bascule::class, function (Faker $faker) {

    return [
        'bascule' => $faker->word,
        'code' => $faker->word,
        'localisation' => $faker->word,
        'contact' => $faker->word,
        'responsable' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
