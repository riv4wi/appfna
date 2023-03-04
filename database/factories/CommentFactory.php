<?php

/** @var Factory $factory */

use App\Comment;
use App\User;
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

$factory->define(Comment::class,  function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'data' => $faker->realText,
        'article_uuid' => $faker->randomElement([
            '808116ca-2e70-466f-8580-e07e4e7d1174',
            '8749d65f-14c9-4665-8243-9530af4ceb19',
            'afc918e8-fe8d-42ce-a145-fba5d4cfbebb'
        ])
    ];
});
