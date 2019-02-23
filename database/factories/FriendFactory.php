<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Friend::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'friend_id' => 2,
        'accepted' => true
    ];
});
