<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\courses;
use Faker\Generator as Faker;

$factory->define(courses::class, function (Faker $faker) {
    return [
        //
        'status' => Rand(0,1),
        'title' => $faker->title,
        'description' => $faker->paragraph,
        'user_id' => Rand(1,10),
    ];
});
