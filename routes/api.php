<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->resource('messages', 'ApiMessageController');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('products/latest', 'ApiProductsController@latest');
Route::get('products', 'ApiProductsController@index')->name('products.index');
Route::get('products/{product}', 'ApiProductsController@show')->name('products.show');

Route::middleware('auth:api')->get('products/create', 'ApiProductsController@create')->name('products.create');
Route::middleware('auth:api')->post('products', 'ApiProductsController@store')->name('products.store');
Route::middleware('auth:api')->get('products/{product}/edit', 'ApiProductsController@edit')->name('products.edit');
Route::middleware('auth:api')->put('products/{product}', 'ApiProductsController@update')->name('products.update');

// Route::resource('products', 'ApiProductsController');
Route::middleware('auth:api')->resource('users', 'ApiUsersController');
