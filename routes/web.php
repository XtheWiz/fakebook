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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/profile/change', 'ProfileController@showChangeProfileForm');

Route::get('/like/{id}', 'PostController@like');
Route::post('/post/new', 'PostController@post');

Route::post('/profile/change', 'ProfileController@change');
Route::get('/profile/image', 'ProfileController@profileImage');

Route::get('/comment/like/{id}', 'CommentController@like');
Route::post('/comment/new/{id}', 'CommentController@comment');
