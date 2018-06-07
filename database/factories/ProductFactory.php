<?php
use Faker\Generator as Faker;

$factory->define(\App\Product::class, function (Faker $faker) {
    return [
        'category_id' => \App\Category::inRandomOrder()->first()->id,
        'name' => $faker->sentence(2),
        'description' => $faker->text,
        'image' => "images/" . $faker->image(storage_path('app/public/images'), 400, 300, '', false)
    ];
});
