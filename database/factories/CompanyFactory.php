<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->lastName . ' B.V.',
        'street' => $faker->streetName,
        'housenumber' => $faker->randomDigit,
        'city' => $faker->city,
        'zip_code' => $faker->numberBetween($min = '1000', $max = '9999') . strToUpper($faker->randomLetter) . strToUpper($faker->randomLetter),
        'logo' => 'public/images/placeholder.png'
    ];
});
