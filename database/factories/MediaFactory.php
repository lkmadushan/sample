<?php

use Faker\Generator as Faker;

$factory->define(App\Media::class, function (Faker $faker) {
    return [
        'title' => $faker->text,
        'content' => $faker->paragraph,
        'status' => $faker->randomElement([0, 1]),
        'tags' => ['foo', 'bar', 'baz'],
        'author_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'approver_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
});
