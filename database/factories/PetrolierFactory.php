<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Petrolier;
use Faker\Generator as Faker;

$factory->define(Petrolier::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'petrolier' => $faker->word
    ];
});
