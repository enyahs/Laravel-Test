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

// General Group
Route::group(['namespace' => 'General'], function()
{

    // Homepage
    Route::get('/', 'HomeController@home')->name('home')->middleware('guest');

    // Resources Group
    Route::group(['namespace' => 'Resources'], function()
    {

        // Post Resource
        Route::resource('/post', 'PostsController')->middleware('auth', ['except' => ['index','show']]);

    });

});

// Auth
Auth::routes();