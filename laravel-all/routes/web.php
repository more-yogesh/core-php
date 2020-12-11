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


// middle wear in routes

Route::group(['middleware' => 'auth'], function () {

    Route::get('products', 'ProductController@index')->name('products.index');
    Route::get('products/create', 'ProductController@create')->name('products.create');
    Route::post('products/store', 'ProductController@store')->name('products.store');
    Route::get('products/{id}/edit', 'ProductController@edit')->name('products.edit');
    Route::post('products/{id}/update', 'ProductController@update')->name('products.update');
    Route::get('products/{id}', 'ProductController@show')->name('products.show');
    Route::post('products/{id}', 'ProductController@destroy')->name('products.destroy');

    // MOdel Method through ORM

    Route::get('categories', 'CategoryController@index')->name('categories.index');
    Route::get('categories/create', 'CategoryController@create')->name('categories.create');
    Route::post('categories/store', 'CategoryController@store')->name('categories.store');
    Route::get('categories/{category}/edit', 'CategoryController@edit')->name('categories.edit');
    Route::post('categories/{category}/update', 'CategoryController@update')->name('categories.update');
    Route::get('categories/{id}', 'CategoryController@show')->name('categories.show');
    Route::post('categories/{category}', 'CategoryController@destroy')->name('categories.destroy');

    // resource

    Route::resource('students', 'StudentController');
});
