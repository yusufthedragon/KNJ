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

Route::group(['prefix' => 'admin'], function () {
    Auth::routes();

    Route::group(['middleware' => ['auth', 'admin']], function () {
        Route::get('/', 'HomeController@index');

        Route::resource('users', 'UserController');

        Route::resource('contact', 'ContactController');

        Route::resource('divisis', 'DivisiController');

        Route::resource('projects', 'ProjectController');

        Route::resource('about_us', 'AboutUsController');

        Route::resource('kepengurusans', 'KepengurusanController');

        Route::resource('followers', 'FollowersController');

        Route::resource('artikels', 'ArtikelController');

        Route::resource('donasi', 'DonasiController')->only(['index', 'show']);
        Route::post('approving/{donasi_id}', 'DonasiController@approvingDonasi')->name('approving_donasi');
    });
});

Route::group(['middleware' => ['visitor']], function () {
    Route::get('/', 'PageController@index')->name('page');

    Route::post('/login', 'PageController@login')->name('login.page');

    Route::post('/register', 'PageController@register')->name('register.page');

    Route::get('/project', 'PageController@projectIndex')->name('project.page');

    Route::get('/project/{slug}', 'PageController@projectDetailIndex')->name('project_detail.page');

    Route::get('/donasi/{jenis}', 'PageController@donasiIndex')->name('donasi.page');

    Route::post('/donasi/store', 'DonasiController@store')->name('donasi.store');

    Route::get('/artikel', 'PageController@artikelIndex')->name('artikel.page');

    Route::get('/artikel/{slug}', 'PageController@artikelDetail')->name('artikel_detail.page');

    Route::get('/profile', 'PageController@profileIndex')->name('profile.page');

    Route::post('/change-profile', 'PageController@changeProfileIndex')->name('change_profile.page');

    Route::get('/daftar-donasi', 'PageController@daftarDonasiIndex')->name('daftar_donasi.page');

    Route::get('/thanks', 'PageController@thanksIndex')->name('thanks.page');
});