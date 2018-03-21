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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/user', 'UserControl@register');

Route::get('/user','UserControl@show');

Route::put('/user/{id}', 'UserControl@update');

Route::delete('/user/{id}', 'UserControl@delete');



Route::post('/item', 'ItemControl@register');

Route::get('/item','ItemControl@show');

Route::put('/item/{id}', 'ItemControl@update');

Route::delete('/item/{id}', 'ItemControl@delete');


Route::get('/all', 'UserControl@all');