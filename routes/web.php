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

Route::get('/', 'App\Http\Controllers\sportifyController@index')->name('index');
Route::get('/contactUs', 'App\Http\Controllers\sportifyController@contactUs')->name('contactUs');
Route::get('/products', 'App\Http\Controllers\sportifyController@products')->name('products');
Route::get('/productDetail/{id}','App\Http\Controllers\sportifyController@productDetail')->name('productDetail');
