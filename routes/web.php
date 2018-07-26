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

// Homepage
Route::get('/', 'General\HomeController@home')->name('home')->middleware('guest');

// Post Resource
Route::resource('/post', 'General\Resources\PostsController')->middleware('auth', ['except' => ['index','show']]);

// Auth
Auth::routes();