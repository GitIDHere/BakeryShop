<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use \App\Models\Products;
use Faker\Generator as Faker;

$factory->define(Products\ProductNutrition::class, function (Faker $faker) {
    return [
        'calories' => $faker->numberBetween(50, 600),
        'carbs' => $faker->numberBetween(50, 200),
        'sugar' => $faker->numberBetween(10, 30),
        'salt' => $faker->numberBetween(50, 100),
        'protein' => $faker->numberBetween(10, 100),
        'fat' => $faker->numberBetween(10, 50),
    ];
});
