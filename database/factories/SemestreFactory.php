<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Semestre;
use Faker\Generator as Faker;

$factory->define(Semestre::class, function (Faker $faker) {
    return [
        'name' => '',
        'date_start' => '',
        'date_end' => '',
    ];
});
