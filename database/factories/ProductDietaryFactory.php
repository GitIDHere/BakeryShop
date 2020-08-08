<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use \App\Models\Products;

$factory->define(Products\Dietary::class, function (Faker $faker) {
    return [
        'is_vegetarian' => $faker->numberBetween(0, 1),
        'is_gluten_free' => 0,
        'is_vegan' => $faker->numberBetween(0, 1),
    ];
});

