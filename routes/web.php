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



//Shop Routes
Route::get('/shop', [
    'as' => 'shop.index',
    'uses' => 'ShopController@index'
]);

Route::get('/shop/{id}', [
    'as' => 'shop.show',
    'uses' => 'ShopController@show'
]);



//Cart Routes
Route::get('/cart', [
    'as' => 'cart.show',
    'uses' => 'CartController@show'
])->middleware('auth');

Route::post('/cart', [
    'as' => 'cart.store',
    'uses' => 'CartController@store'
])->middleware('auth');



//Cart Items Routes
Route::post('/item/{id}', [
    'as' => 'item.add',
    'uses' => 'ItemController@store'
])->middleware('auth');

Route::delete('/item/{id}', [
    'as' => 'item.destroy',
    'uses' => 'ItemController@destroy'
])->middleware('auth');



//MyOrders Routes
Route::get('/my_orders', [
    'as' => 'cart.orders',
    'uses' => 'CartController@my_orders'
])->middleware('auth');



  ////////////////////////////////////////////
 /////////////Admin Routes///////////////////
////////////////////////////////////////////

Route::get('/admin', [
    'as' => 'admin.orders',
    'uses' => 'AdminController@orders_index'
])->middleware('auth');


//Orders Routes
Route::get('/admin/orders', [
    'as' => 'admin_orders_index',
    'uses' => 'AdminController@orders_index'
])->middleware('auth');

Route::get('/admin/orders/{id}', [
    'as' => 'admin_orders_show',
    'uses' => 'AdminController@orders_show'
])->middleware('auth');



//Customers
Route::get('/admin/customers', [
    'as' => 'admin_customer_index',
    'uses' => 'AdminController@customers_index'
])->middleware('auth');

Route::get('/admin/customers/{id}', [
    'as' => 'admin_customer_show',
    'uses' => 'AdminController@customers_show'
])->middleware('auth');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
