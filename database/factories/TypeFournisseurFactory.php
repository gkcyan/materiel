<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TypeFournisseur;
use Faker\Generator as Faker;

$factory->define(TypeFournisseur::class, function (Faker $faker) {

    return [
        'type_fournisseur' => $faker->word,
        'code_type_fournisseur' => $faker->word,
        'observation' => $faker->word,
        'autor_creat' => $faker->word,
        'autor_update' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
