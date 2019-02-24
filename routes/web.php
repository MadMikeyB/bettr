<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(['verify' => true]);

Route::view('/', 'pages.front-page')->name('home');
Route::view('/how-it-works', 'pages.how-it-works')->name('how-it-works');
Route::view('/terms', 'static.terms')->name('static.terms');
Route::view('/privacy', 'static.privacy')->name('static.privacy');
Route::view('/trophies', 'static.trophies')->name('static.trophies');
Route::view('/how-it-works', 'static.how-it-works')->name('static.how-it-works');

// Profiles

Route::get('/@{user}', 'Profile\\ProfileController@show')->name('profiles.show');
Route::get('/@{user}/edit', 'Profile\\ProfileController@edit')->name('profiles.edit');

Route::resource('goals', 'Goal\\GoalController');
