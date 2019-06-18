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

//Route For get All user list & search
Route::match(['GET','POST'],'users', 'UserController@index')->name('users');

//Route For fetch single user details
Route::get('users/{id}', 'UserController@show')->name('users.show');

//Route For GET API call example
Route::get('users/api/call', 'UserController@getGuzzleRequest');

//Route For POST API call example
Route::get('users/api/call/post', 'UserController@postGuzzleRequest');