<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TeacherStudents;
use Faker\Generator as Faker;

$factory->define(TeacherStudents::class, function (Faker $faker) {
    return [
        //
        'user_id' => Rand(1,10),
        'tacher' => Rand(1, 10),
        'student' => Rand(1, 10),
        'state' => Rand(1, 2),
    ];
});
