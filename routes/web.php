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
    return redirect('/shop/home');

});

Route::prefix('/admin')->middleware('admin')->group(function () {

    Route::get('/create', [
        'uses' => 'App\Http\Controllers\AdminController@create',
        'as' => 'admin.create'
    ]);

    Route::get('/update/{id}', [
        'uses' => 'App\Http\Controllers\AdminController@update',
        'as' => 'admin.update'
    ]);

    Route::get('/delete/{id}', [
        'uses' => 'App\Http\Controllers\AdminController@delete',
        'as' => 'admin.delete'
    ]);

    Route::post('/createProduct', [
        'uses' => 'App\Http\Controllers\AdminController@createProduct',
        'as' => 'admin.createProduct'
    ]);

    Route::post('/updateProduct', [
        'uses' => 'App\Http\Controllers\AdminController@updateProduct',
        'as' => 'admin.updateProduct'
    ]);
});

Route::prefix('/shop')->group(function () {

    Route::get('/home', [
        'uses' => 'App\Http\Controllers\ShopController@home',
        'as' => 'shop.home'
    ]);

    Route::get('/products', [
        'uses' => 'App\Http\Controllers\ShopController@products',
        'as' => 'shop.products',
        'middleware' => 'auth'
    ]);

    Route::get('/cart', [
        'uses' => 'App\Http\Controllers\ShopController@cart',
        'as' => 'shop.cart',
        'middleware' => 'auth'
    ]);

    Route::get('/orders', [
        'uses' => 'App\Http\Controllers\ShopController@orders',
        'as' => 'shop.orders',
        'middleware' => 'auth'
    ]);

    Route::get('/product/{id}', [
        'uses' => 'App\Http\Controllers\ShopController@product',
        'as' => 'shop.product',
        'middleware' => 'auth'
    ]);

    Route::get('/placeOrder', [
        'uses' => 'App\Http\Controllers\ShopController@placeOrder',
        'as' => 'shop.placeOrder',
        'middleware' => 'auth'
    ]);

    Route::post('/addToCart', [
        'uses' => 'App\Http\Controllers\ShopController@addToCart',
        'as' => 'shop.addToCart',
        'middleware' => 'auth'
    ]);


});

Auth::routes();
