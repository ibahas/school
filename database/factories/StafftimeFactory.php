<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\stafftime;
use Faker\Generator as Faker;

$factory->define(stafftime::class, function (Faker $faker) {
    return [
        //
        'user_id' => Rand(1,10),
        'state' => Rand(1,2),
        'date' => $faker->date,
    ];
});
