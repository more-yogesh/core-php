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

Route::get('products', 'ProductController@index');
Route::get('products/create', 'ProductController@create');
Route::post('products/store', 'ProductController@store');
Route::get('products/{id}/edit', 'ProductController@edit');
Route::post('products/update/{id}', 'ProductController@update');
Route::get('products/destroy/{id}', 'ProductController@destroy');
Route::get('products/{id}', 'ProductController@show');
