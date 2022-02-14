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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    $gender = $faker->randomElement(['male', 'female']);

    return [
        'name' => $faker->userName,
        'nombre' => $faker->firstName($gender),
        'apellido' => $faker->Lastname,
        'dni' => $faker->randomNumber(8),
        'discapacidad' => $faker->randomElement(['0', '1']),
        'galpon' => $faker->firstName(),
        'prepa' => $faker->firstName(),
        'email' => $faker->unique()->safeEmail,
        'company' => $faker->firstName(),
        'celular' => $faker->randomNumber(9),
        'country' => $faker->country(),
        'state' => $faker->state(),
        'district' => $faker->state(),
        'direction' => $faker->address(),
        'job' => $faker->jobTitle(),
        'password' => $password ?: $password = bcrypt('asa'),
        'question' => $faker->randomElement(['0', '1']),
        'answer' => $password ?: $password = bcrypt('asa'),
        'remember_token' => str_random(10),
    ];
});
