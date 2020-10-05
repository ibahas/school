<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\dateworkprograms;
use Faker\Generator as Faker;

$factory->define(dateworkprograms::class, function (Faker $faker) {
    return [
        //
        'date' => $faker->date,
        'evaluation' => Rand(1,10),
        'student_id' => Rand(1,10),
        'status' => Rand(0,1),
        'user_id' => Rand(1,10),
        'program_id' => Rand(1,10),
    ];
});
