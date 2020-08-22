<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Products\PromotedProductType::class, function (Faker $faker) {
    return [
        'show_on_home_header_tiles' => $faker->boolean(30)
    ];
});
