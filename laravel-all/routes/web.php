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

Route::get('products', 'ProductController@index')->name('products.index');
Route::get('products/create', 'ProductController@create')->name('products.create');
Route::post('products/store', 'ProductController@store')->name('products.store');
Route::get('products/{id}/edit', 'ProductController@edit')->name('products.edit');
Route::post('products/{id}/update', 'ProductController@update')->name('products.update');
Route::get('products/{id}', 'ProductController@show')->name('products.show');
Route::post('products/{id}', 'ProductController@destroy')->name('products.destroy');
