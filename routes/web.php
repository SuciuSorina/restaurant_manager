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
    return view('welcome');
});

Route::resource('categories', 'CategoryController');
Route::resource('products', 'ProductController');
Route::resource('coupons', 'CouponController');
Route::resource('orders', 'OrderController');
Route::resource('feedbacks', 'FeedbackController');
Route::get('profiles', 'UserController@getProfile');
Route::get('/order-items', 'OrderController@getOrderParts')->name('cart');
Route::get('/check-code/{code}/{total}', 'OrderController@applyCoupon');

Route::post('/add-order-items', 'OrderController@addOrderParts');
Route::post('/remove-order-items', 'OrderController@removeOrderParts');

Route::post('/update-status', 'OrderController@updateOrderStatus');

Route::get('/customers', 'UserController@getCustomers');
Route::get('/show-order/{id}', 'OrderController@showOrder');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
