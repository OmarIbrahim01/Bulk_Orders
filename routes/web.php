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

Route::middleware(['admin', 'auth'])->group(function () {

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

    //Products
    Route::resource('/admin/products', 'ProductsController');

    Route::delete('/admin/products/{image_id}/delete', [
        'as' => 'delete.product.image',
        'uses' => 'ProductsController@destroy_image'
    ])->middleware('auth');


    //Settings
    Route::get('/admin/settings', [
        'as' => 'settings.index',
        'uses' => 'SettingsController@index'
    ])->middleware('auth');

    Route::post('/admin/settings/set_min_quantity', [
        'as' => 'settings.setQty',
        'uses' => 'SettingsController@save_min_quantity'
    ])->middleware('auth');

    Route::put('/admin/settings/set_admin', [
        'as' => 'settings.set_admin',
        'uses' => 'SettingsController@set_admin'
    ])->middleware('auth');

    Route::put('/admin/settings/unset_admin', [
        'as' => 'settings.unset_admin',
        'uses' => 'SettingsController@unset_admin'
    ])->middleware('auth');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


