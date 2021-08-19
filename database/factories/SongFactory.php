<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Song;
use Faker\Generator as Faker;

$factory->define(Song::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(2),
        'artist' => $faker->name,
        'lyrics' => $faker->sentence(100)
    ];
});
