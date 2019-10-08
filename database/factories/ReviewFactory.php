<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'start_date' => now(),
        'end_date' => now(),
        'rating' => $faker->numberBetween($min = '1', $max = '10'),
        'role' => $faker->jobTitle,
        'type' => 'oriënterende-/afstudeerstage',
        'details' => $faker->text($maxNbChars = 191)
    ];
});