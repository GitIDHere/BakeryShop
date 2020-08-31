<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Products\Images\Image::class, function (Faker $faker) {
    return [
        'path' => 'https://loremflickr.com/640/360',
		'weight' => $faker->numberBetween(0, 100)
    ];
});
