<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');
Route::get('story/{date}/{permalink}', 'PostController@showPost')->name('show.post');
Route::post('subscriber', 'SubscriberController@store')->name('subscriber.store');

Route::group(['middleware' => 'auth'], function () {

    Route::resource('posts', 'PostController');

});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('show.login');
Route::post('login', 'Auth\LoginController@login')->name('post.login');
Route::get('logout ', 'Auth\LoginController@logout')->name('logout');

