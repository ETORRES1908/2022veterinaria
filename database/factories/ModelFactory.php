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
    static $answer;

    $gender = $faker->randomElement(['male', 'female']);

    return [
        'name' => $faker->unique()->userName,
        'usert' => $faker->randomElement(['own', 'cls', 'cdk', 'jdg', 'ppr', 'asst', 'amt']),
        'nombre' => $faker->firstName($gender),
        'apellido' => $faker->Lastname,
        'dni' => $faker->randomNumber(8),
        'discapacidad' => $faker->randomElement(['No', 'Visual', 'Fisica', 'Auditiva', 'Verbal', 'Mental']),
        'galpon' => $faker->firstName(),
        'prepa' => $faker->firstName(),
        'email' => $faker->unique()->safeEmail,
        'company' => $faker->firstName(),
        'celular' => $faker->randomNumber(9),
        'country' => 'PER',
        'state' => $faker->randomElement(['AM', 'AN', 'AP', 'AY', 'CJ', 'CZ']),
        'district' => $faker->state(),
        'direction' => $faker->address(),
        'job' => $faker->jobTitle(),
        'password' => $password ?: $password = bcrypt('123'),
        'question' => $faker->randomElement(['0', '1']),
        'answer' => $answer ?: $answer = bcrypt('123'),
        'remember_token' => str_random(10),
    ];
});
