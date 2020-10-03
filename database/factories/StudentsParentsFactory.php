<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\studentsParents;
use Faker\Generator as Faker;

$factory->define(studentsParents::class, function (Faker $faker) {
    return [
        //
        'titleReport' => $faker->title(1,10),
        'detailsReport' => $faker->title(1,10),
        'student'=> Rand(1,10),
         'byUser'=> Rand(1,10),
         'parent'=> Rand(1,10),
        
    ];
});
