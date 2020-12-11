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

Route::get('about-us/{id}', function(){
    return '<h1>THIS IS ABOUT PAGE</h1>';
})->name('about');

Route::get('/test', function () {
    return 'testing data';
});

Route::get('post/this-is-my-test/{id?}', function ($id = '') {
    return view('home');
});

Route::get('home/{name?}', 'WelcomeController@index');

Route::get('product/create', 'ProductController@create')->name('product.create');
Route::post('product/insert', 'ProductController@insert')->name('product.store');;
Route::get('product', 'ProductController@index')->name('product.index');
Route::get('product/destroy/{id}', 'ProductController@destroy')->name('product.destroy');
Route::get('product/edit/{id}', 'ProductController@edit')->name('product.edit');
Route::post('product/update/{id}', 'ProductController@update')->name('product.update');
Route::post('product/show/{id}', 'ProductController@show')->name('product.show');




