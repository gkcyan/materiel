<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FactureTicket;
use Faker\Generator as Faker;

$factory->define(FactureTicket::class, function (Faker $faker) {

    return [
        'facture_id' => $faker->randomDigitNotNull,
        'ticket_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
