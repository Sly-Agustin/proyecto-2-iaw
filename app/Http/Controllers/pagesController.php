<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

use App\Http\Requests\CreateUserRequest;
use Validator;

class pagesController extends Controller
{
    public function inicio(){
        return view('inicio');
    }

    public function productos(){
        $productos=App\Producto::paginate(2);
        return view('productos', compact('productos'));
    }

    public function qs(){
        return view('qs');
    }

    public function crear_usuario(){
        return view('crear_usuario');
    }

    public function crear_usuario_result(CreateUserRequest $request){
        $validator = Validator::make($request->all(), $request->rules(), $request->messages());
        if ($validator->valid()){
            try { 
                $nuevoUsuario=new App\User;
                $nuevoUsuario->username = $request->usuario;
                $nuevoUsuario->password = $request->contrasenia;
                $nuevoUsuario->nombre = $request->nombre;
                $nuevoUsuario->email = $request->email;
                $nuevoUsuario->apellido = $request->apellido;
    
                $nuevaDireccion=new App\Domicilio;
                $nuevaDireccion->direccion = $request->direccion;
                $nuevaDireccion->codigoPostal = $request->codigoPostal;
                $nuevaDireccion->telefono = $request->telefono;
                
                $nuevoUsuario->save();
                $nuevaDireccion->save();
            } 
            catch(\Illuminate\Database\QueryException $ex){ 
                 //dd($ex->getMessage());  A modo de ejemplo para obtener que es lo que falló
                 switch ($ex->getCode()) {
                    case 23502:
                        return back()->with('mensajeError', 'Error, al menos un campo obligatorio no fue llenado'); //Nunca debería llegarse a esto, puesto por las dudas para debug
                        break;
                    case 23505:
                        return back()->with('mensajeError', 'Error, usuario o email ya utilizado'); //Nunca debería llegarse a esto, puesto por las dudas para debug
                        break;
                    default:
                        return back()->with('mensajeError', 'Error en la creacion de usuario');
                        break;
                }         
            }
            return back()->with('mensaje', 'Creación de usuario exitosa');
            //return view('resultUser.result');
        }       
    }

    public function detallado($nombre){
        $datos = App\Producto::findOrFail($nombre);
        return view('productos.detallado', compact('datos'));
    }
}
