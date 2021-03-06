<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\programs;
use Faker\Generator as Faker;

$factory->define(programs::class, function (Faker $faker) {
    return [
        //
        'user_id' => Rand(1,10),
        'title' => $faker->title,
        'description' => $faker->paragraph,
        'status' => Rand(1,2)
    ];
});
