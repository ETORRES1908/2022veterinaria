<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\LParticipantes::class, function (Faker\Generator $faker) {
    static $password;

    $dt = $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now');
    $date = $dt->format('d/m/Y'); // 1994-09-24

    return [];
});
