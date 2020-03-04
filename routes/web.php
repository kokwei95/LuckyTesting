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

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'user'], function () {
    Route::view('/draw', 'user.drawForm')->name('userDrawForm');
    Route::post('/draw/submit', 'User\UserController@submitDraw')->name('userSubmitForm');
});

Route::get('admin/register', 'Auth\RegisterController@showAdminRegisterForm')->name('adminRegister');
Route::post('admin/register', 'Auth\RegisterController@createAdmin')->name('postAdminRegister');
Route::group(['prefix' => 'admin', 'middleware' => ['is_admin']], function () {
    Route::get('/home', 'HomeController@adminHome')->name('admin.home');
    Route::get('/draw', 'Admin\AdminController@drawForm')->name('drawForm');
    Route::post('/draw/submit', 'Admin\AdminController@submitDraw')->name('submitForm');
});
