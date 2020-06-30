<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\ModifyProductRequest;
use App\Http\Requests\UpdateStockRequest;
use App\Http\Requests\AddProductBackRequest;
use App\Http\Requests\AddEmployeeRequest;
use Illuminate\Support\Facades\Hash;
use App;
use Validator;

class adminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:jefe');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin');
    }

    public function agregarProducto() {
        return view('admin/agregarProducto');
    }

    public function agregarProductoPost(CreateProductRequest $request){
        $validator = Validator::make($request->all(), $request->rules(), $request->messages());
        if ($validator->valid()){
            $nuevoProducto= new App\Producto;
            $nuevoProducto->nombre=$request->productoNombre;
            $nuevoProducto->descripcion=$request->productoDescripcion;
            $nuevoProducto->descripcionLarga=$request->productoDescripcionLarga;
            $nuevoProducto->tipo=$request->productoTipo;
            $nuevoProducto->urlFabricante=$request->productoUrl;
            $nuevoProducto->precio=$request->productoPrecio;
            $nuevoProducto->stock=$request->productoStock;
            $nuevoProducto->estaEnVenta=true;
            $nuevoProducto->save();
            return back()->with('mensaje', 'Producto agregado exitosamente');
        }
    }

    public function quitarProducto() {
        $productos=App\Producto::all()->where('estaEnVenta', true);
        return view('admin/quitarProducto', compact('productos'));
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

    public function modificarStock() {
        $productos=App\Producto::all();
        $productosNoVenta=App\Producto::all()->where('estaEnVenta', true);
        $productosVenta=App\Producto::all()->where('estaEnVenta', false);
        return view('admin/modificarStock', compact('productos', 'productosNoVenta', 'productosVenta'));
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

    public function agregarProductoVentaPost(AddProductBackRequest $request){
        $validator = Validator::make($request->all(), $request->rules(), $request->messages());
        $productoAgregar = App\Producto::findOrFail($request->idProducto);
        if ($validator->valid()){
            $productoAgregar->estaEnVenta=true;
            $productoAgregar->save();
        }
        return back()->with('mensaje', 'Producto agregado a la lista');
    }

    public function agregarEmpleado(){
        return view('admin/agregarEmpleado');
    }

    public function agregarEmpleadoPost(AddEmployeeRequest $request){
        $validator = Validator::make($request->all(), $request->rules(), $request->messages());
        if ($validator->valid()){
            $nuevoEmpleado = new App\Empleado;
            $nuevoEmpleado->nombre=$request->nombre;
            $nuevoEmpleado->apellido=$request->apellido;
            $nuevoEmpleado->email=$request->email;
            $nuevoEmpleado->password=Hash::make($request->contrasenia);
            $nuevoEmpleado->username=$request->usuario;
            $nuevoEmpleado->save();   
        }
        return back()->with('mensaje', 'Empleado creado correctamente');
    }
}
