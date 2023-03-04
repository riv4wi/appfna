<?php

/** @var Factory $factory */

use App\Article;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

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

$factory->define(Article::class,  function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'title' => $faker->words,
        'content' => $faker->realText,
        'user_uuid' => $faker->randomElement(['cb9229d1-c0ba-4d9b-9c7f-7f5bcac2f55c', 'e018658c-11bb-47cb-9011-e1374eeac731']),
    ];
});
