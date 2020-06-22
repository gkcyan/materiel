<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TypeAccompte;
use Faker\Generator as Faker;

$factory->define(TypeAccompte::class, function (Faker $faker) {

    return [
        'type_accompte' => $faker->word,
        'code_type_accompte' => $faker->word,
        'description' => $faker->word,
        'statut' => $faker->randomDigitNotNull,
        'autor_creat' => $faker->word,
        'autor_update' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
