<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Products\Images\ProductTypeImage::class, function (Faker $faker) {
    return [
        'tile_image' => $faker->imageUrl()
    ];
});
