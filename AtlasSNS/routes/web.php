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
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@registerPage')->name('register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::get('/top','PostsController@index');
Route::post('/top','PostsController@create');
Route::get('post/{id}/delete', 'PostsController@delete');

Route::get('/logout','Auth\LoginController@logout');

Route::get('/profile','UsersController@profile');
Route::post('/profile','UsersController@updateProfile');

Route::get('/search','UsersController@searchPage');
Route::post('/search','UsersController@search');

Route::post('/follow','UsersController@follow');
Route::post('/unfollow','UsersController@unfollow');

Route::get('/follow-list','UsersController@followList');
Route::get('/follower-list','UsersController@followerList');
