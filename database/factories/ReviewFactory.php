<?php

use Faker\Generator as Faker;

$factory->define(App\Review::class, function (Faker $faker) {
    return [
        'comment' => $faker->paragraph,
        'status' => $faker->randomElement([0, 1]),
        'author_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'approver_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'media_id' => function () {
            return factory(App\Media::class)->create()->id;
        },
    ];
});
