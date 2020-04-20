<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Broodfund;
use Faker\Generator as Faker;

$factory->define(Broodfund::class, function (Faker $faker) {
    return [

        'name' => $faker->lastName,
    ];
});
