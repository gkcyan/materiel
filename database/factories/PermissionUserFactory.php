<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PermissionUser;
use Faker\Generator as Faker;

$factory->define(PermissionUser::class, function (Faker $faker) {

    return [
        'permission_id' => $faker->randomDigitNotNull,
        'user_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
