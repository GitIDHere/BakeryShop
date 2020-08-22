<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Products\PromotedProduct::class, function (Faker $faker) {
    return [
        'is_featured' => $faker->boolean(60)
    ];
});
