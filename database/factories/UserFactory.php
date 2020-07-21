<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $name = $faker->firstname;
    $ap = $faker->lastname;
    $am =  $faker->lastname;

    return [
        'name' => $name,
        'ap' => $ap,
        'am' => $am,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('acceso.jama'), // password
        'remember_token' => Str::random(10),
        'typeUser_id' => 1,
        'birthdate' => now(),
        'sex_id' => rand(1, 3),
        'profilePicture' => 'https://api.adorable.io/avatars/285/' . str_replace(' ', '', $name . $ap . $am) . '.png'
    ];
});
