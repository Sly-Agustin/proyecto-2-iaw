<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout', 'userLogout');
    }

    public function userLogout(){
        Auth::guard('web')->logout();
        
        // Experimental API, si causa problemas borrar
        $user = Auth::guard('api')->user();
        if ($user) {
            $user->api_token = null;
            $user->save();
        } //

        return redirect('/');  
    }
    

    // Esto es experimental para los tokens, si el usuario empieza a funcionar raro QUITAR Y USAR LOGIN TRADICIONAL !!!
    public function login(Request $request)
    {
        $this->validateLogin($request);
    
        // Cada vez que se loguee cambia el token (tambien en la base de datos)
        if ($this->attemptLogin($request)) {
            $user = $this->guard()->user();
            $user->generateToken();
    
            return view('inicio');
        }
    
        return $this->sendFailedLoginResponse($request);
    }
}
