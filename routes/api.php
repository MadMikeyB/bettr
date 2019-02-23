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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('goals')->namespace('Goal')->group(function() {
    Route::post('/', 'GoalController@store')->name('api.goals.store');
    Route::patch('/{goal}', 'GoalController@update')->name('api.goals.update');
    Route::delete('/{goal}', 'GoalController@destroy')->name('api.goals.destroy');
});
