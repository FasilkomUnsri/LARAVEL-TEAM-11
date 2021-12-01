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

Route::get('admin/film', 'AdminController@film')->name('film');
Route::get('admin/film/add', 'AdminController@create')->name('filmcreate');
Route::post('admin/film/add', 'AdminController@store')->name('filmstore');
Route::get('admin/film/edit/{id}', 'AdminController@edit')->name('filmstore');
Route::post('admin/film/edit', 'AdminController@update')->name('filmedit');
Route::get('admin/film/delete/{id}', 'AdminController@destroy')->name('filmdelete');
// Route::get('/', 'FilmController@index')->name('user');
Route::get('film', 'FilmController@index')->name('userfilm');
Route::get('film/{id}', 'FilmController@show')->name('userfilm');
Route::post('film/{id}', 'FilmController@add')->name('komentar');
Route::get('/', 'AdminController@login')->name('login');
Route::get('register', 'AdminController@register')->name('register');
Route::post('register', 'AdminController@register_process')->name('register_process');
Route::post('admin', 'AdminController@process')->name('process');
Route::get('admin/logout', 'AdminController@logout')->name('logout');
