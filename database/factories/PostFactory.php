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

$factory->define(App\Models\Post::class, function (Faker\Generator $faker) {
    return [
        'user_id'      => 1,
        'title'        => $faker->sentence(),
        'body'         => $faker->text(rand(300, 1000)),
        'published_at' => Carbon\Carbon::now(),
        'published'    => true,
    ];
});
