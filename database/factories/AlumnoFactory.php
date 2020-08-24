<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Alumno;
use Faker\Generator as Faker;

$factory->define(Alumno::class, function (Faker $faker) {
    return [
        'fullname' => $faker->firstName.' '.$faker->lastName
    ];
});
