<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CarburantFacture;
use Faker\Generator as Faker;

$factory->define(CarburantFacture::class, function (Faker $faker) {

    return [
        'facture_id' => $faker->randomDigitNotNull,
        'ventepetrolier_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
