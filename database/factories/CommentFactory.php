<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Comment::class, function (Faker $faker) {
    $goal = factory(\App\Models\Goal::class)->create();
    return [
        'user_id' => $goal->user_id,
        'comment' => $faker->paragraph,
        'model_id' => $goal->id,
        'model_type' => get_class($goal)
    ];
});
