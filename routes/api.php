<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

// Borrar si no andan
//Route::get('logout', 'Auth\LoginController@logout');
//Route::post('login', 'Auth\LoginController@login');

Route::get('/productos/{id}', 'ApiProductosController@show')->name('api.productos.id');
Route::post('/productos/agregar', 'ApiProductosController@storeCustom')->name('api.productos.agregar')->middleware('auth:api');
Route::resource('productos', 'ApiProductosController');