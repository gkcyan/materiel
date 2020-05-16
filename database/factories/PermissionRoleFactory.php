<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PermissionRole;
use Faker\Generator as Faker;

$factory->define(PermissionRole::class, function (Faker $faker) {

    return [
        'permission_id' => $faker->randomDigitNotNull,
        'role_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
