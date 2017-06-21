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

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
https://richos.gitbooks.io/laravel-5/content/capitulos/chapter9.html

$factory->define(App\Customer::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'lastname' => $faker->lastname,
        'docid' => str_random(10),
        'pin' => str_random(4),
        'email' => $faker->unique()->safeEmail,
    ];
});