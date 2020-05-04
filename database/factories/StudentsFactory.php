<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\students;
use Faker\Generator as Faker;

$factory->define(students::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'bod' => $faker->date,
        'phone' => '059' . $faker->regexify('[0-9]{' . mt_rand(7, 7) . '}'),
        'photo' => '',
        'address' => $faker->address,
        'last_degree' => 0,
        'rating' => 0,
        'pearint_id' => Rand(1, 10),
        'wallet_id' => Rand(1, 10),
        'program_id' => Rand(1, 10),
        'user_id' => Rand(1, 10),
    ];
});
