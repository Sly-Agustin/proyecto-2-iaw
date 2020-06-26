<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BuyProductRequest;
use App;
use Auth;

use Validator;

class productoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos=App\Producto::paginate(2);
        return view('productos', compact('productos'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function detallado($nombre){
        $datos = App\Producto::findOrFail($nombre);
        return view('productos.detallado', compact('datos'));
    }

    public function comprar($nombre){
        $datos = App\Producto::findOrFail($nombre);
        $userLogged = Auth::id();
        $datosTarjeta = App\Tarjeta::where('user_id', $userLogged)->get();
        $datosTodasTarjetas = App\Tarjeta::all()->where('user_id', $userLogged);
        session(['producto' => $nombre]);
        return view('productos.comprar', compact('datos', 'datosTodasTarjetas'));
    }

    /*public function comprado($nombre){
        $datos = App\Producto::findOrFail($nombre);
        $array = [
            "datos" => $datos->nombre,
            "numero" => '1',
        ];
        return view('productos.comprado', compact('array'));
    }*/

    public function compradoPost(BuyProductRequest $request, $idProducto){
        $validator = Validator::make($request->all(), $request->rules(), $request->messages());
        $request->request->add(['id_producto' => $idProducto]);
        if ($request->session()->get('producto') != $idProducto){
            $request->session()->forget('producto');
            return "Algo salió mal, la clave del producto no coincide con la URL, la próxima vez no modifique el html de la página :)";
        }
        if ($validator->valid()){
            $datos = App\Producto::findOrFail($idProducto);
            $array = [
                "nombre" => $datos->nombre,
                "numero" => $request->cantidadCompra,
            ];
            $nuevaCompra = new App\Compra;
            $nuevaCompra->cantidad=$array['numero'];
            $nuevaCompra->producto_id=$idProducto;
            $nuevaCompra->nombre=$datos->nombre;
            $nuevaCompra->user_id=Auth::id();
            $nuevaCompra->save();
            return view('productos.compradoPost', compact('array'));
        }
    }
}
