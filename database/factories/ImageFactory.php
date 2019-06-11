<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Image::class, function (Faker $faker) {

    $noteable = App\Image::class;

    return [
        'image' =>  $faker->image( storage_path('app/public/products'),400,300, '', false), 
        'product_id' => $faker->numberBetween(1,20)
    ];
});
