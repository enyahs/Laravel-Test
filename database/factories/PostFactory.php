<?php

use Faker\Generator as Faker;

// Post Factory
$factory->define(App\Models\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'body' => $faker->paragraphs(rand(2,10), true),
    ];
});
