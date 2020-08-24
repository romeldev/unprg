<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Docente;
use Faker\Generator as Faker;

$factory->define(Docente::class, function (Faker $faker) {
    return [
        'fullname' => $faker->name( ['male', 'female'][rand(0,1)] ),
    ];
});
