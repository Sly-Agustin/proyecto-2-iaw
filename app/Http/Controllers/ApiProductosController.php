<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;
use App;

class ApiProductosController extends Controller
{
    public function __construct()
    {
        /*$this->middleware('auth:jefe');*/
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(App\Producto::All(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){

    }
    public function storeCustom(CreateProductRequest $request)
    {
        $productoNuevo = new App\Producto;
        $productoNuevo->nombre=$request->productoNombre;
        $productoNuevo->descripcion=$request->productoDescripcion;
        $productoNuevo->descripcionLarga=$request->productoDescripcionLarga;
        $productoNuevo->precio=$request->productoPrecio;
        $productoNuevo->tipo=$request->productoTipo;
        $productoNuevo->urlFabricante=$request->productoUrl;
        $productoNuevo->estaEnVenta=$request->estaEnVenta;
        $productoNuevo->imagen=$request->imagen;
        $productoNuevo->stock=$request->productoStock;
        $productoNuevo->save();
        return response('guardado', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto=App\Producto::where('id_producto', $id)->get();
        return response()->json($producto, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
