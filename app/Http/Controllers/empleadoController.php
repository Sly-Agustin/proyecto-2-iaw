<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\ModifyProductRequest;
use App\Http\Requests\UpdateStockRequest;
use App\Http\Requests\AddProductBackRequest;
use App\Http\Requests\NewSaleRequest;
use App;
use Validator;

class empleadoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:empleado');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('empleado');
    }

    public function modificarStock() {
        $productos=App\Producto::all();
        $productosNoVenta=App\Producto::all()->where('estaEnVenta', true);
        $productosVenta=App\Producto::all()->where('estaEnVenta', false);
        return view('empleado/modificarStock', compact('productos', 'productosNoVenta', 'productosVenta'));
    }

    public function modificarStockPost(UpdateStockRequest $request) {
        $validator = Validator::make($request->all(), $request->rules(), $request->messages());
        $productoUpdate = App\Producto::findOrFail($request->idProducto);  
        if ($validator->valid()){
            $productoUpdate->stock=$request->nuevoStock;
            $productoUpdate->save();
        }
        return back()->with('mensaje', 'Stock actualizado');
    }

    public function quitarProductoPost(ModifyProductRequest $request) {
        $validator = Validator::make($request->all(), $request->rules(), $request->messages());
        $productoQuitar = App\Producto::findOrFail($request->idProducto);
        if ($validator->valid()){
            $productoQuitar->estaEnVenta=false;
            $productoQuitar->save();
        }
        return back()->with('mensaje', 'Producto quitado de la lista');
    }

    public function agregarProductoVentaPost(AddProductBackRequest $request){
        $validator = Validator::make($request->all(), $request->rules(), $request->messages());
        $productoAgregar = App\Producto::findOrFail($request->idProducto);
        if ($validator->valid()){
            $productoAgregar->estaEnVenta=true;
            $productoAgregar->save();
        }
        return back()->with('mensaje', 'Producto agregado a la lista');
    }

    public function registrarCompra() {
        $productosNoVenta=App\Producto::all()->where('estaEnVenta', true);
        return view('empleado/registrarCompra', compact('productosNoVenta'));
    }

    public function registrarCompraPost(NewSaleRequest $request) {
        $validator = Validator::make($request->all(), $request->rules(), $request->messages());
        $productoComprar = App\Producto::findOrFail($request->idProducto);
        if ($validator->valid()){
            // Esto no se hace en el validador porque podría recibir datos de stock antiguos si se basa en el valor que viene del HTML y generar compras sin stock disponible.
            if ($productoComprar->stock<$request->cantidadCompra) {
                return back()->with('mensajeErrorStock','No hay stock suficiente para la compra');
            }
            $productoComprar->stock=($productoComprar->stock) - ($request->cantidadCompra);
            $productoComprar->save();

            $productoCambio=new App\Cambio_stock;
            $productoCambio->cantidad=$request->cantidadCompra;
            $productoCambio->descripcion="Compra en el local físico";
            $productoCambio->producto_id=$productoComprar->id_producto;
            $productoCambio->empleado_id=Auth::id();
            $productoCambio->save();
        }
        return back()->with('mensaje', 'Registro de compra exitoso');
    }  
}