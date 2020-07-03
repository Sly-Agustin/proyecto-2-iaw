<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddCreditCardRequest;
use App\Http\Requests\RemoveCreditCardRequest;
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
        $usuarioTarjetasCompact = compact('usuarioTarjetas');
        foreach($usuarioTarjetas as $tarj){
            session([$tarj->id => $tarj->id]);
        }
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
    public function tarjetaQuitar(RemoveCreditCardRequest $request){
        // Si bien esto no evita que remueva la tarjeta equivocada modificando el html si evita que borre tarjetas de otros usuarios.
        if($request->tarjeta!=$request->session()->get($request->tarjeta)){
            return 'No modifique el html para quitar tarjetas de otras personas :)';
        }
        $tarjetaEliminar=App\Tarjeta::findOrFail($request->tarjeta);
        $tarjetaEliminar->delete();

        return back()->with('mensaje', 'Tarjeta eliminada de manera exitosa!');
    }
}
