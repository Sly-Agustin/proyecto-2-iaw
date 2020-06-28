<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class JefeLoginController extends Controller
{
    public function __construct() {
        $this->middleware('guest:jefe');     /* Analizar si es admin o jefe */
    }

    public function showLoginForm(){
        return view('auth.jefeLogin');
    }

    public function login(Request $request){
        // Validar datos
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tratar de loguear al jefe, no es necesario hashear la pw xq el attempt lo hace
        if(Auth::guard('jefe')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            // Si se loguea, redirigir
            return redirect()->intended(route('jefe.dashboard'));
        }
        
        // Si no volver al login
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
