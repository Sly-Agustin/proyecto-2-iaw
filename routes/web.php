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
})->name('laravel-home');

/*Route::view('inicio', 'inicio')->name('inicio');*/
Route::get('inicio', 'pagesController@inicio')->name('inicio');
Route::get('qs', 'pagesController@qs')->name('qs');
Route::get('crear_usuario', 'pagesController@crear_usuario')->name('crearUsuario');

Route::post('crear_usuario/result', 'pagesController@crear_usuario_result')->name('crearUsuario.result');

/*Route::get('productos', function () {
    return view('productos');
})->name('productos');*/
Route::get('productos', 'pagesController@productos')->name('productos');

Route::get('productos/{nombre}', 'pagesController@detallado')->name('productos.detallado');
