<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use \App\Models\Products;

$factory->define(Products\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName('male'),
        'type' => $faker->word(),
        'origin' => $faker->word(),
        'days_till_expire' => $faker->numberBetween(3, 60),
        'width' => $faker->randomFloat(null, 0, 225),
        'height' => $faker->randomFloat(null, 0, 225),
        'img' => $faker->imageUrl(),
        'description' => $faker->text(),
        'quantity' => $faker->numberBetween(0, 100),
        'unit' => 'loaf',
    ];
});
