<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Target::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'user_id' => 1,
        'goal_id' => 1,
        'complete_by' => $faker->dateTimeThisMonth->format('Y-m-d H:i:s'),
        'completed_at' => null
    ];
});
