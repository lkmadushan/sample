<?php

use Faker\Generator as Faker;

$factory->define(App\Role::class, function (Faker $faker) {
    return [
        'title' => $faker->randomElement(['redkite', 'admin', 'general'])
    ];
});
