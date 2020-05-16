<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\role;
use Faker\Generator as Faker;

$factory->define(role::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'slug' => $faker->word,
        'description' => $faker->word,
        'level' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
