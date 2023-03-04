<?php

/** @var Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
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

//$factory->define(User::class,  function (Faker $faker) {
//    $faker->locale('pt_BR');
//    return [
//        'uuid' => $faker->uuid,
//        'username' => $faker->userName,
//        'email' => $faker->unique()->safeEmail,
//        'email_verified_at' => now(),
//        'password' => bcrypt($faker->randomKey),
//        'remember_token' => Str::random(10),
//    ];
//});

$factory->define(User::class,  function (Faker $faker) {
    $faker->locale('ar_SA');
    return [
        'uuid' => $faker->uuid,
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt($faker->randomKey),
        'remember_token' => Str::random(10),
    ];
});
