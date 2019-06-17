<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Conversation::class, function (Faker $faker) {
    return [
        'receiver_id' => $faker->numberBetween(1,20),
        'user_id' => $faker->numberBetween(1,20),
        'message_id' => $faker->numberBetween(1,20)
        
    ];
});
