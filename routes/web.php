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

/*Route::get('/', function () {
    return view('welcome');
})->name('laravel-home');*/
Route::get('/', 'pagesController@inicio')->name('laravel-home');

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

Route::post('productos/busquedaPost', 'productoController@busquedaPost')->name('productos.busquedaPost');
Route::get('productos/filtro/{nombre}', 'productoController@filtroCategoria')->name('productos.filtroCategoria');
Route::resource('/productos', 'productoController');

/*Rutas correspondientes a las rutas de los usuarios, su panel de control, etc*/ 
Route::get('usuario/logout', 'Auth\LoginController@userLogout')->name('usuario.userLogout');
Route::get('usuario/panel_de_control', 'usuarioController@panel')->name('usuario.panel_de_control');
Route::post('usuario/tarjeta_agregada', 'usuarioController@tarjetaAgregar')->name('usuario.tarjeta_agregada');
Route::delete('usuario/tarjeta_quitada', 'usuarioController@tarjetaQuitar')->name('usuario.tarjeta_quitada');
Route::resource('/usuario', 'usuarioController');

/*Rutas jefe */
Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\JefeLoginController@showLoginForm')->name('jefe.login');
    Route::post('/login', 'Auth\JefeLoginController@login')->name('jefe.login.submit');
    Route::get('/logout', 'Auth\JefeLoginController@logout')->name('jefe.logout');
    Route::get('/agregarP', 'adminController@agregarProducto')->name('jefe.agregarProducto');
    Route::post('/agregadoP', 'adminController@agregarProductoPost')->name('jefe.agregarProductoPost');
    Route::get('/modificar_stock', 'adminController@modificarStock')->name('jefe.modificarStock');
    Route::put('/modificar_stock_post', 'adminController@modificarStockPost')->name('jefe.modificarStockPost');
    Route::get('/quitar_producto', 'adminController@quitarProducto')->name('jefe.quitarProducto');
    Route::put('/quitar_producto_post', 'adminController@quitarProductoPost')->name('jefe.quitarProductoPost');
    Route::put('/agregar_back_post', 'adminController@agregarProductoVentaPost')->name('jefe.agregarProductoVentaPost');
    Route::get('/agregar_empleado', 'adminController@agregarEmpleado')->name('jefe.agregarEmpleado');
    Route::post('/agregar_empleado', 'adminController@agregarEmpleadoPost')->name('jefe.agregarEmpleadoPost');
    Route::get('/quitar_empleado', 'adminController@quitarEmpleado')->name('jefe.quitarEmpleado');
    Route::put('/quitar_empleado_post', 'adminController@quitarEmpleadoPost')->name('jefe.quitarEmpleadoPost');
    Route::put('/habilitar_empleado_post', 'adminController@habilitarEmpleadoPost')->name('jefe.habilitarEmpleadoPost');
    /*Rutas mail jefe*/
    Route::post('/password/email', 'Auth\JefeForgotPasswordController@sendResetLinkEmail')->name('jefe.password.email');
    Route::get('/password/reset', 'Auth\JefeForgotPasswordController@showLinkRequestForm')->name('jefe.password.request');
    Route::post('/password/reset', 'Auth\JefeResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\JefeResetPasswordController@showResetForm')->name('jefe.password.reset');
    Route::get('/', 'adminController@index')->name('jefe.dashboard');
}); 

/*Rutas empleado */
Route::prefix('empleado')->group(function() {
    Route::get('/login', 'Auth\EmpleadoLoginController@showLoginForm')->name('empleado.login');
    Route::post('/login', 'Auth\EmpleadoLoginController@login')->name('empleado.login.submit');
    Route::get('/logout', 'Auth\EmpleadoLoginController@logout')->name('empleado.logout');
    Route::get('/modificar_stock', 'empleadoController@modificarStock')->name('empleado.modificarStock');
    Route::put('/modificar_stock_post', 'empleadoController@modificarStockPost')->name('empleado.modificarStockPost');
    Route::put('/quitar_producto_post', 'empleadoController@quitarProductoPost')->name('empleado.quitarProductoPost');
    Route::put('/agregar_back_post', 'empleadoController@agregarProductoVentaPost')->name('empleado.agregarProductoVentaPost');
    Route::get('/registrar_compra', 'empleadoController@registrarCompra')->name('empleado.registrarCompra');
    Route::put('/registrar_compra_post', 'empleadoController@registrarCompraPost')->name('empleado.registrarCompraPost');
    /*Rutas mail empleado*/
    Route::post('/password/email', 'Auth\EmpleadoForgotPasswordController@sendResetLinkEmail')->name('empleado.password.email');
    Route::get('/password/reset', 'Auth\EmpleadoForgotPasswordController@showLinkRequestForm')->name('empleado.password.request');
    Route::post('/password/reset', 'Auth\EmpleadoResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\EmpleadoResetPasswordController@showResetForm')->name('empleado.password.reset');
    Route::get('/', 'empleadoController@index')->name('empleado.dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



/*Rutas mail de prueba*/
Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('agustin_sly@hotmail.com')->send(new \App\Mail\MyTestMail($details));
   
    dd("Email is Sent.");
});
