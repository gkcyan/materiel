<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ChauffeurPermi;
use Faker\Generator as Faker;

$factory->define(ChauffeurPermi::class, function (Faker $faker) {

    return [
        'permis_ref' => $faker->word,
        'categories' => $faker->word,
        'date_validitie' => $faker->date('Y-m-d H:i:s'),
        'date_exp' => $faker->date('Y-m-d H:i:s'),
        'autor_creat' => $faker->word,
        'autor_update' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
