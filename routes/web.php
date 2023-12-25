<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\sportifyController;
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
Route::get('/products/{catId}', 'App\Http\Controllers\sportifyController@categoryProducts')->name('categoryProducts');
Route::get('/productDetail/{id}', 'App\Http\Controllers\sportifyController@productDetail')->name('productDetail');
Route::get('/preorder', 'App\Http\Controllers\sportifyController@preorder')->name('preorder');
Route::get('/checkout-submit', 'App\Http\Controllers\sportifyController@submit')->name('checkout.submit');


Route::get('/dashboard', 'App\Http\Controllers\sportifyController@adminDashboard')->name('dashboard');
Route::get('/delprods', 'App\Http\Controllers\sportifyController@deleteProds')->name('delprods');
Route::get('/delete/{id}', 'App\Http\Controllers\sportifyController@destroy');


// Route::post('/checkout-submit', [sportifyController::class, 'submit'])->name('checkout.submit');

Route::post('/sendMail',[sportifyController::class,'submit'])->name("sendMail");

// Route::get('/add-to-cart/{encodedSend}', 'App\Http\Controllers\sportifyController@addItem')->name('don');
Route::get('add-to-cart/{id}/{quantity}/{color}/{size}', 'App\Http\Controllers\sportifyController@addItem');
Route::get('/test', function () {
    return view('test');
});

Route::get('delete/{index}/{previousURL}', 'App\Http\Controllers\sportifyController@removeItem');
Route::get('/admin', 'App\Http\Controllers\sportifyController@loginPage');

Route::get('/addProduct', 'App\Http\Controllers\sportifyController@addProductPage')->name('addProduct');

Route::post('/insert', 'App\Http\Controllers\sportifyController@insert');

Route::post('/insertClientQuery', 'App\Http\Controllers\sportifyController@storeClientQuery')->name('insertClientQuery');
Route::get('/client_queries', 'App\Http\Controllers\sportifyController@showClientQueries')->name('client_queries');
Route::get('/deleteClientQuery/{id}', 'App\Http\Controllers\sportifyController@destroyClientQuery');


