<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddCreditCardRequest;
use App;

use Validator;


class usuarioController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function panel(){
        $usuario = Auth::user();
        $usuarioTarjetas = App\Tarjeta::all()->where('user_id', $usuario->id);
        $usuarioCompras = App\Compra::all()->where('user_id', $usuario->id);
        //return compact('usuario', 'usuarioTarjetas');
        return view('usuario.panel', compact('usuario', 'usuarioTarjetas', 'usuarioCompras'));
    }
    public function tarjetaAgregar(AddCreditCardRequest $request){
        $validator = Validator::make($request->all(), $request->rules(), $request->messages());
        if ($validator->valid()){
            $nuevaTarjeta = new App\Tarjeta;
            $nuevaTarjeta->banco=$request->bancoNombre;
            $nuevaTarjeta->numero=$request->bancoNumero;
            $nuevaTarjeta->user_id=Auth::id();
            $nuevaTarjeta->save();
            return back()->with('mensaje', 'Tarjeta agregada de manera exitosa!');
        }
    }
}
