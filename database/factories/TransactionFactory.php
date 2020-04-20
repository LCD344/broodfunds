<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Broodfund;
use App\Models\Transaction;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        'broodfund_id' => factory(Broodfund::class),
        'user_id' => factory(User::class),
        'name' => $faker->name,
        'description' => $faker->text,
        'amount' => $faker->randomFloat(2)
    ];
});
