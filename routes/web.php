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

/*Rutas correspondientes a las rutas principales y a los links del header*/
/*Route::view('inicio', 'inicio')->name('inicio');*/
Route::get('inicio', 'pagesController@inicio')->name('inicio');
Route::get('qs', 'pagesController@qs')->name('qs');
Route::get('crear_usuario', 'pagesController@crear_usuario')->name('crearUsuario');

Route::post('crear_usuario/result', 'pagesController@crear_usuario_result')->name('crearUsuario.result');

/*Rutas correspondientes a las páginas de los productos, compras de los mismos*/
Route::get('productos/{id}', 'productoController@detallado')->name('productos.detallado');
//Route::get('productos/{id}/comprar', 'productoController@comprar')->name('productos.comprar')->middleware('auth');
Route::get('productos/{id}/comprar', 'productoController@comprar', function() {
    $value = session('key', 'default');
})->name('productos.comprar')->middleware('auth');
Route::post('productos/{id}/compradoPost', 'productoController@compradoPost')->name('productos.compradoPost');
Route::resource('/productos', 'productoController');

/*Rutas correspondientes a las rutas de los usuarios, su panel de control, etc*/ 
Route::get('usuario/panel_de_control', 'usuarioController@panel')->name('usuario.panel_de_control');
Route::post('usuario/tarjeta_agregada', 'usuarioController@tarjetaAgregar')->name('usuario.tarjeta_agregada');
Route::resource('/usuario', 'usuarioController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
