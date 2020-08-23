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

Route::get('/products', 'HomeController@index')->name('home');
Route::get('/AddToCart/{id}', 'ProductsController@addtocart')->name('add-to-cart');//addtocart
Route::get('/cart', 'ProductsController@cart')->name('cart')->middleware('auth');//cart
Route::get('/checkout', 'ProductsController@checkout')->name('checkout')->middleware('auth');//checkout page
Route::get('/orders', 'ProductsController@orders')->name('orders')->middleware('auth');//orders page
Route::get('/vieworder/{id}', 'ProductsController@vieworder')->name('vieworder')->middleware('auth');//viewing order


Route::post('/update-cart', 'ProductsController@updatecart')->name('update-cart');//update cart value
Route::post('/delete-cart', 'ProductsController@deletecart')->name('delete-cart');//delete cart value
Route::post('/order', 'ProductsController@order')->name('order'); //add order




