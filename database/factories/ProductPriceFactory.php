<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use \App\Models\Products;

$factory->define(Products\ProductPrice::class, function (Faker $faker) {
    return [
        'price_per_unit' => $faker->randomFloat(2, 10, 150),
        'discounted_percentage' => $faker->randomFloat(2, 0, 100),
        'vat' => $faker->randomFloat(2, 20, 30),
    ];
});
