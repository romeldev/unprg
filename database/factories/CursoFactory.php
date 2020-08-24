<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Curso;
use Faker\Generator as Faker;

$factory->define(Curso::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->words( rand(3,5), true),
    ];
});
