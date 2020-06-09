<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TypeZone;
use Faker\Generator as Faker;

$factory->define(TypeZone::class, function (Faker $faker) {

    return [
        'type_zone' => $faker->word,
        'code_type_zone' => $faker->word,
        'observation' => $faker->word,
        'autor_creat' => $faker->word,
        'autor_update' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
