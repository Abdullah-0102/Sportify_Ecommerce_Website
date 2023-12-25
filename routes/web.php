<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
Route::get('/productDetail/{id}', 'App\Http\Controllers\sportifyController@productDetail')->name('productDetail');
Route::get('/preorder', 'App\Http\Controllers\sportifyController@preorder')->name('preorder');
// Route::get('/add-to-cart/{encodedSend}', 'App\Http\Controllers\sportifyController@addItem')->name('don');
Route::get('add-to-cart/{id}/{quantity}/{color}/{size}', 'App\Http\Controllers\sportifyController@addItem');
Route::get('/test', function () {
    return view('test');
});

Route::get('delete/{index}/{previousURL}', 'App\Http\Controllers\sportifyController@removeItem');
Route::get('/admin', 'App\Http\Controllers\sportifyController@loginPage');

Route::get('/addProduct', 'App\Http\Controllers\sportifyController@addProductPage');

Route::post('/insert', 'App\Http\Controllers\sportifyController@insert');
