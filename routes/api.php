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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', 'Api\BackEndController@login');
Route::post('/regis', 'Api\BackEndController@store');
Route::get('/produk', 'Api\BackEndController@produk');
Route::post('/checkout', 'Api\TransaksiController@store');
Route::get('/checkout/user/{id}', 'Api\TransaksiController@history');
