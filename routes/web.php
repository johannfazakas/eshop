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

Route::prefix('/shop')->group(function () {

    Route::get('/home', [
        'uses' => 'App\Http\Controllers\ShopController@home',
        'as' => 'shop.home'
    ]);

    Route::get('/products', [
        'uses' => 'App\Http\Controllers\ShopController@products',
        'as' => 'shop.products'
    ]);

    Route::get('/cart', [
        'uses' => 'App\Http\Controllers\ShopController@cart',
        'as' => 'shop.cart'
    ]);

    Route::get('/product/{id}', [
        'uses' => 'App\Http\Controllers\ShopController@product',
        'as' => 'shop.product'
    ]);

    Route::get('/create', [
        'uses' => 'App\Http\Controllers\ShopController@create',
        'as' => 'shop.create'
    ]);

    Route::post('/addToCart', [
        'uses' => 'App\Http\Controllers\ShopController@addToCart',
        'as' => 'shop.addToCart'
    ]);

    Route::post('/createProduct', [
        'uses' => 'App\Http\Controllers\ShopController@createProduct',
        'as' => 'shop.createProduct'
    ]);
});

Auth::routes();
