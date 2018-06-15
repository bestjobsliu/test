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



Route::get('/index', 'userController@index');
Route::get('/permission/all', 'permissionController@all');
Route::get('/role/all', 'roleController@all');
Route::get('/role/update', 'roleController@updateGet');



Route::get('/user/getUserList', 'userController@getUserList');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
