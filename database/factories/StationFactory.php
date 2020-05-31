<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Station;
use Faker\Generator as Faker;

$factory->define(Station::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'station' => $faker->word,
        'petrolier_id' => $faker->randomDigitNotNull
    ];
});
