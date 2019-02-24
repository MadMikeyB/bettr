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

// Profiles

Route::get('/@{user}', 'Profile\\ProfileController@show')->name('profiles.show');

Route::resource('goals', 'Goal\\GoalController');
