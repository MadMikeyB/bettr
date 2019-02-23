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
