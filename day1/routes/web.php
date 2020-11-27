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

Route::get('/test', function () {
    return 'testing data';
});

Route::get('post/this-is-my-test/{id?}', function ($id = '') {
    return view('home');
});

Route::get('home/{name?}', 'WelcomeController@index');

Route::get('product/create', 'ProductController@create');
Route::post('product/insert', 'ProductController@insert');
Route::get('product/index', 'ProductController@index');
Route::get('product/destroy/{id}', 'ProductController@destroy');
Route::get('product/edit/{id}', 'ProductController@edit');
Route::post('product/update/{id}', 'ProductController@update');
Route::post('product/show/{id}', 'ProductController@show');




