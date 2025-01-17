<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //if (Auth::guard($guard)->check()) {
        //    return redirect(RouteServiceProvider::HOME);
        //}
        switch($guard) {
            case 'jefe':
                if(Auth::guard($guard)->check()){
                    return redirect()->route('jefe.dashboard');
                }
                break;
            default:
                if(Auth::guard($guard)->check()){
                    return redirect()->route('/home');
                }
                break;
        }

        return $next($request);
    }
}
