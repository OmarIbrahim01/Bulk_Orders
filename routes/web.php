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

Route::get('/', 'ShopController@index');



Route::get('/shop', [
    'as' => 'shop.index',
    'uses' => 'ShopController@index'
]);

Route::get('/shop/{id}', [
    'as' => 'shop.show',
    'uses' => 'ShopController@show'
]);


Route::post('/add_to_cart', [
    'as' => 'add_to_cart',
    'uses' => 'CartController@store'
]);




Route::get('/cart', [
    'as' => 'cart.show',
    'uses' => 'CartController@show'
]);

Route::post('/cart', [
    'as' => 'cart.store',
    'uses' => 'CartController@store'
]);

Route::get('/my_orders', [
    'as' => 'cart.orders',
    'uses' => 'CartController@my_orders'
]);



Route::delete('/item/{id}', [
    'as' => 'item.destroy',
    'uses' => 'ItemController@destroy'
]);

Route::post('/item/{id}', [
    'as' => 'item.add',
    'uses' => 'ItemController@store'
]);








Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
