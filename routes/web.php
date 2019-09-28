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

Auth::routes();

Route::get('/', 'HomeController@index');

Route::resource('users', 'UserController');

Route::resource('subjects', 'SubjectController');

Route::resource('profiles', 'ProfileController');

Route::resource('artikels', 'ArtikelController');

Route::resource('contacts', 'ContactController');

Route::resource('divisis', 'DivisiController');

Route::resource('projects', 'ProjectController');

Route::resource('aboutuses', 'AboutUsController');

Route::resource('kepengurusans', 'KepengurusanController');

Route::resource('followers', 'FollowersController');

Route::resource('donasis', 'DonasiController');