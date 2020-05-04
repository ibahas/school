<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\presencestudents;
use Faker\Generator as Faker;

$factory->define(presencestudents::class, function (Faker $faker) {
    return [
        //
        'date' => $faker->date,
        'student_id'=>Rand(1,10),
        'user_id'=>Rand(1,10),
        'status'=>Rand(0,1),
    ];
});
