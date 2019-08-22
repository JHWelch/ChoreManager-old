<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Chore;
use Faker\Generator as Faker;

$factory->define(Chore::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3),
        'description' => $faker->sentence(10),
        'frequency_id' => $faker->numberBetween(0, 4),
    ];
});
