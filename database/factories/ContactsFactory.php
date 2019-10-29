<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
// use Faker\Generator as Faker;

$faker = Faker\Factory::create('nl_NL');

$factory->define(Contact::class, function ($faker) {
    return [
        'company_id' => $faker->numberBetween($min = 1, $max = 10),
        'function' => $faker->jobTitle(),
        'gender' => $faker->title($gender = 'male'|'female'),
        'name' => $faker->name(),
        'email' => $faker->safeEmail(),
        'phone_number' => $faker->phoneNumber()
    ];
});