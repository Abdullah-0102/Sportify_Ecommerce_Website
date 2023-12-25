<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\sportifyController;

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

Route::get('/', 'App\Http\Controllers\sportifyController@index')->name('index');
Route::get('/checkout', 'App\Http\Controllers\sportifyController@checkOutPage')->name('checkOutPage');
Route::get('/index', 'App\Http\Controllers\sportifyController@index')->name('index');
Route::get('/contactUs', 'App\Http\Controllers\sportifyController@contactUs')->name('contactUs');
Route::get('/products', 'App\Http\Controllers\sportifyController@products')->name('products');
Route::get('/productDetail/{id}','App\Http\Controllers\sportifyController@productDetail')->name('productDetail');
Route::get('/preorder', 'App\Http\Controllers\sportifyController@preorder')->name('preorder');
Route::get('/checkout-submit', 'App\Http\Controllers\sportifyController@submit')->name('checkout.submit');


Route::get('/dashboard', 'App\Http\Controllers\sportifyController@adminDashboard')->name('delprods');
Route::get('/delprods', 'App\Http\Controllers\sportifyController@deleteProds')->name('delprods');
Route::get('/delete/{id}', 'App\Http\Controllers\sportifyController@destroy');


// Route::post('/checkout-submit', [sportifyController::class, 'submit'])->name('checkout.submit');

Route::get('/sendMail',[sportifyController::class,'submit'])->name("sendMail");

