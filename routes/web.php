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

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('categories', 'App\http\Controllers\CategoriesController');
Route::get('categories', 'App\http\Controllers\CategoriesController@index');
Route::post('categories', 'App\http\Controllers\CategoriesController@store')->middleware('ValidateData');
Route::put('categories/{id}', 'App\http\Controllers\CategoriesController@update')->middleware('ValidateData');
Route::delete('categories/{id}', 'App\http\Controllers\CategoriesController@destroy');
