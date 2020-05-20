<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\entreprise;
use Faker\Generator as Faker;

$factory->define(entreprise::class, function (Faker $faker) {

    return [
        'libelle' => $faker->word,
        'actif' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
