<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
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
    $active = $faker->boolean;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$I5RRXHPgOCcIi15k.5uyqelabq2GtZv8BH3jwSIvDzm5LO5vJ1LNq', // test
        'remember_token' => Str::random(10),
        'verify_token' => $active ? null : Str::uuid(),
        'role' => $active ? $faker->randomElement([User::ROLE_USER, User::ROLE_ADMIN]) : User::ROLE_USER,
        'status' => $active ? User::STATUS_ACTIVE : User::STATUS_WAIT,
    ];
});
