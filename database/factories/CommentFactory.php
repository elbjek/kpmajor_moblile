<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'comment_content' => $faker->sentence(2,true),
        'user_id' => $faker->numberBetween(1,20),
        'product_id' => $faker->numberBetween(1,20)
    ];
});
