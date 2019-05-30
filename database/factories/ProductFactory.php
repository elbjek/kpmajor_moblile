<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'title' => $faker->word(),
        'description' => $faker->sentence(3,true),
        'price' => $faker->numberBetween(0,1),
        'seen' => $faker->numberBetween(0,1),
        'user_id' => $faker->numberBetween(1,20)
    ];
});
