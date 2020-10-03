<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\logStudents;
use Faker\Generator as Faker;

$factory->define(logStudents::class, function (Faker $faker) {
    return [
        //
        'student_id' => rand(1, 10),
        'state' => rand(1, 2),
        'date_add' => $faker->date(),
        'date_leave' => $faker->date(),
        'user_id' => rand(1, 6),
        'program_id' => rand(1, 10),
    ];
});
