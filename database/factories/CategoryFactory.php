<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use \App\Models\Products;

$factory->define(Products\Categories::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->firstName,
        'is_promoted' => $faker->boolean(20),
    ];
});
