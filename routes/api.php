<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('goals')->namespace('Goal')->group(function() {
    Route::post('/', 'GoalController@store')->name('api.goals.store');
    Route::patch('/{goal}', 'GoalController@update')->name('api.goals.update');
    Route::delete('/{goal}', 'GoalController@destroy')->name('api.goals.destroy');
    Route::get('/', 'GoalController@index')->name('api.goals.index');
    Route::get('/{goal}', 'GoalController@show')->name('api.goals.show');
});

Route::prefix('targets')->namespace('Target')->group(function() {
    Route::post('/', 'TargetController@store')->name('api.targets.store');
    Route::patch('/{target}', 'TargetController@update')->name('api.targets.update');
    Route::delete('/{target}', 'TargetController@destroy')->name('api.targets.destroy');
    Route::get('/', 'TargetController@index')->name('api.targets.index');
    Route::get('/{target}', 'TargetController@show')->name('api.targets.show');
});

Route::prefix('comments')->namespace('Comment')->group(function() {
    Route::post('/', 'CommentController@store')->name('api.comments.store');
    Route::patch('/{comment}', 'CommentController@update')->name('api.comments.update');
    Route::delete('/{comment}', 'CommentController@destroy')->name('api.comments.destroy');
});

Route::prefix('profiles')->namespace('Profile')->group(function() {

    Route::get('/{user}', 'ProfileController@show')->name('api.profiles.show');

    Route::prefix('goals')->group(function() {
        Route::get('/{user}', 'GoalController@show')->name('api.profiles.goals.show');
    });

    Route::prefix('friends')->group(function() {
        Route::get('/{user}', 'FriendController@show')->name('api.profiles.friends.show');
    });
});
