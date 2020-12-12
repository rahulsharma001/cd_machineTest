<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'photo' => $faker->image('public/storage/product_images', 640, 480, null, false),
        'quantity' => 20,
        'description' => $faker->paragraph,
        'price' => $faker->randomFloat(2, 0, 10000),
        'category_id' => function () {
            return factory(App\Category::class)->create()->id;
        }
    ];
});
