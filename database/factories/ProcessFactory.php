<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Process;
use Faker\Generator as Faker;

$factory->define(Process::class, function (Faker $faker) {

    return [
        'processus' => $faker->word,
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
