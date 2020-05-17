<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Agence;
use Faker\Generator as Faker;

$factory->define(Agence::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'libelle' => $faker->word,
        'entreprise_id' => $faker->text
    ];
});
