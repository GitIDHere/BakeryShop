<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use \App\Models\Products;
use Faker\Generator as Faker;

$factory->define(\App\Models\Products\ProductIngredient::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
    ];
});
