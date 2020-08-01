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
//
//old way 
//Route::get('/', function () {
//    return view('pages.home');
//});
//
//
//Route::get('/about', function () {
//    return view('pages.about');
//});
//new way
Route::view('/', 'pages.home');
Route::view('about', 'pages.about');
//Route::view('shop', 'shop.shop');
Route::get('shop', 'ShopController@displayShop');
Route::get('shop/{categorey}', 'shopController@displayCategory');
Route::get('shop/{categorey}/{product}', 'shopController@displayProduct');

Route::get('add-to-cart/{product_id}', 'CartController@addToCart');
Route::post('add-to-cart', 'CartController@addToCartByQty');
Route::get('cart', 'CartController@displayCart');
Route::post('update-cart', 'CartController@updateCart');
Route::get('delet-item/{rowId}','CartController@deletItem');
Route::get('delete-cart','CartController@deletCart');

Route::get('signup','UserController@DisplaySignup');
Route::post('signup', 'UserController@processSignup');

 Route::get('login', 'UserController@displayLogin');
 Route::post('login', 'UserController@processLogin');
 
 Route::get('logout','UserController@logout');