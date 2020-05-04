<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\presenceusers;
use Faker\Generator as Faker;

$factory->define(presenceusers::class, function (Faker $faker) {
    return [
        //
        'status' => Rand(0,1),
        'user' => Rand(1,10),
        'user_id' => Rand(1,10),
    ];
});
