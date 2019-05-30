<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker) {
    return [
        'message_content' => $faker->sentence(3,true),
        'user_id' => $faker->numberBetween(1,20)
    ];
});
