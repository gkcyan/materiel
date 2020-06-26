<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AccompteFacture;
use Faker\Generator as Faker;

$factory->define(AccompteFacture::class, function (Faker $faker) {

    return [
        'facture_id' => $faker->randomDigitNotNull,
        'accompte_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
