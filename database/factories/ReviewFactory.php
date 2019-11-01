<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1,$max = 50),
        'company_id' => $faker->numberBetween($min = 1, $max = 10),
        'title' => $faker->name,
        'start_date' => now(),
        'end_date' => now(),
        'rating' => $faker->numberBetween($min = '1', $max = '5'),
        'role' => $faker->jobTitle,
        'type' => 'oriënterende-/afstudeerstage',
        'contact' => $faker->name,
        'contact_email' => $faker->email,
        'contact_phonenumber' => $faker->phoneNumber,
        'details' => $faker->text($maxNbChars = 191),
    ];
});