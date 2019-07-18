<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */


use Faker\Generator as Faker;

$factory->define(App\Models\Projects::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'id_user' => rand(1,30),
    ];
});
