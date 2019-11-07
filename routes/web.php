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

Route::redirect('/', '/dashboard');

Route::group(['middleware' => ['web']], function () {
    Route::get('/dashboard', 'HomeController@Index')->name('dashboard');

    Route::match(['get', 'post'], '/profile', 'UserController@Profile')->name('profile');
    Route::post('/profile/password', 'UserController@ChangePassword');

    Route::match(['get', 'post'], '/order', 'OrderController@NewOrder');
    Route::match(['get', 'post'], '/order/{hairdresser?}/{date?}', 'OrderController@CreateOrder');

    Route::get('/admin', 'AdminController@Index')->name('admin-index');
});
