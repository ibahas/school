<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\coursetesting;
use Faker\Generator as Faker;

$factory->define(coursetesting::class, function (Faker $faker) {
    return [
        //
        'course_id' => Rand(1, 10),
        'student_id' => Rand(1, 10),
        'user_id' => Rand(1, 10),
        'rating' => Rand(1, 10),
        'status' => Rand(0, 1),
    ];
});
