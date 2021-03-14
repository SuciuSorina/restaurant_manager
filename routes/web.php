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
Route::resource('orders', 'OrderController');
Route::get('/order-items', 'OrderController@getOrderParts');
Route::post('/add-order-items', 'OrderController@addOrderParts');
Route::post('/update-status', 'OrderController@updateOrderStatus');

Route::get('/customers', 'UserController@getCustomers');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
