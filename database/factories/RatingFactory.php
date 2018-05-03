<?php

use Faker\Generator as Faker;

$factory->define(App\Rating::class, function (Faker $faker) {
    return [
        'value' => $faker->randomElement([0, 1, 2, 3, 4, 5]),
        'author_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'media_id' => function () {
            return factory(App\Media::class)->create()->id;
        },
    ];
});
