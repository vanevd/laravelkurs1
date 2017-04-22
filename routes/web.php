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

//Route::get('clients', 'ClientController@index');

//Route::get('clients/{client_id}', 'ClientController@show');

Route::resource('clients', 'ClientController');
Route::get('clients/{client_id}/delete', 'ClientController@destroy');
Route::post('clients/{client_id}', 'ClientController@update');

Route::resource('products', 'ProductController');
Route::get('products/{product_id}/delete', 'ProductController@destroy');
Route::post('products/{product_id}', 'ProductController@update');

Route::get('orders/new', 'OrderController@create');
Route::resource('orders', 'OrderController');
Route::get('orders/{order_id}/delete', 'OrderController@destroy');
Route::get('orders/{order_id}/edit', 'OrderController@edit');
Route::get('order_details/{order_detail_id}/delete', 'OrderController@destroyProduct');
Route::post('order_details', 'OrderController@storeProduct');

Route::get('tests', 'TestController@index');
Route::get('tests/{test_id}', 'TestController@show');
Route::post('tests/{test_id}', 'TestController@submit');

