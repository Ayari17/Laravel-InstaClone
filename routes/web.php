<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes();
Route::get('/email',function (){
    return new \App\Mail\NewUserWelcomeEmail();
});

Route::get('/','PostsController@index' );
Route::post('/follow/{user}','FollowsController@store');

Route::get('/p/create','PostsController@create')->name('posts.create');
Route::get('/p/{post}','PostsController@show')->name('posts.show');
Route::post('/p','PostsController@store')->name('posts.store');

Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::get('/profile/{userId}', 'ProfilesController@index')->name('profile.show');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
