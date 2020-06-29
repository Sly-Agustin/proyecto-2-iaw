<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class EmpleadoLoginController extends Controller
{
    public function __construct() {
        $this->middleware('guest:empleado');     /* Analizar si es empleado o guest */
    }

    public function showLoginForm(){
        return view('auth.empleadoLogin');
    }

    public function login(Request $request){
        // Validar datos
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tratar de loguear al empleado, no es necesario hashear la pw xq el attempt lo hace
        if(Auth::guard('empleado')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            // Si se loguea, redirigir
            return redirect()->intended(route('empleado.dashboard'));
        }
        
        // Si no volver al login
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
