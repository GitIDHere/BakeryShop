<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use \App\Models\Products;
use Faker\Generator as Faker;

$factory->define(Products\ProductRating::class, function (Faker $faker) {
    return [
        'avg_rating' => $faker->randomFloat(null, 0, 5),
        'ratings_count' => $faker->numberBetween(1, 250),
    ];
});
