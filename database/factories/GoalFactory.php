<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Goal::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'description' => $faker->paragraph,
        'user_id' => 1,
        'category_id' => 1,
        'icon' => null 
    ];
});
