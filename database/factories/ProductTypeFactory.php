<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Products\ProductType::class, function (Faker $faker) {
    return [
        'name' => 'bread',
		'is_eaten' => 1
    ];
});
