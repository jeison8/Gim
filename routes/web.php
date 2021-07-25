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

Route::get('/', 'HomeController@redirection')->name('redirection');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('users', 'UserController@index')->name('users.index');
Route::get('create', 'UserController@create')->name('users.create');
Route::post('store', 'UserController@store')->name('users.store');
Route::get('show/{user}', 'UserController@show')->name('users.show');
Route::get('edit/{user}', 'UserController@edit')->name('users.edit');
Route::patch('update/{user}', 'UserController@update')->name('users.update');
Route::get('destroy/{user}', 'UserController@destroy')->name('users.destroy');
Route::get('renovate/{user}', 'UserController@renovate')->name('users.renovate');
Route::patch('renovated/{user}', 'UserController@renovated')->name('users.renovated');
Route::get('history/{user}', 'UserController@history')->name('users.history');
Route::get('destroy-history/{user}', 'UserController@destroyHistory')->name('users.destroyHistory');
Route::get('amount', 'UserController@amount')->name('users.amount');
Route::post('consult', 'UserController@consult')->name('users.consult');
//Route::post('find', 'UserController@find')->name('users.find');












