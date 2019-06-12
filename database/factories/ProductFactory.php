<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'title' => $faker->word(),
        'description' => $faker->sentence(3,true),
        'price' => $faker->numberBetween(0,5000),
        'category_id' => $faker->numberBetween(1,20),
        'user_id' => $faker->numberBetween(1,20),
        'image' =>  $faker->image( storage_path('app/public/products'),400,300, '', false), 
    ];
});
