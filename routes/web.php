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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::post('add', 'CardController@create')->name('add');
Route::get('add', 'CardController@create')->name('add');
Route::get('welcome', 'CardController@index')->name('show');
Route::get('/', 'CardController@index')->name('welcome');
Route::get('edit/{id}', 'CardController@edit')->name('edit');
Route::get('delete/{id}', 'CardController@destroy')->name('delete');


