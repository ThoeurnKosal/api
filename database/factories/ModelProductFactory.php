<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'detail' => $faker->paragraph,
        'price' => $faker->numberBetween(10,100),
        'stock'=> $faker->randomDigit,
        'discount' => $faker->numberBetween(2,9),
        'user_id' => function(){
            return App\User::all()->random();
        }
    ];
});
