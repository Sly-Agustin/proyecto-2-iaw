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

/*Rutas jefe */
Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\JefeLoginController@showLoginForm')->name('jefe.login');
    Route::post('/login', 'Auth\JefeLoginController@login')->name('jefe.login.submit');
    Route::get('/agregarP', 'adminController@agregarProducto')->name('jefe.agregarProducto');
    Route::post('/agregadoP', 'adminController@agregarProductoPost')->name('jefe.agregarProductoPost');
    Route::get('/modificar_stock', 'adminController@modificarStock')->name('jefe.modificarStock');
    Route::put('/modificar_stock_post', 'adminController@modificarStockPost')->name('jefe.modificarStockPost');
    Route::get('/quitar_producto', 'adminController@quitarProducto')->name('jefe.quitarProducto');
    Route::put('/quitar_producto_post', 'adminController@quitarProductoPost')->name('jefe.quitarProductoPost');
    Route::put('/agregar_back_post', 'adminController@agregarProductoVentaPost')->name('jefe.agregarProductoVentaPost');
    Route::get('/', 'adminController@index')->name('jefe.dashboard');
}); 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
