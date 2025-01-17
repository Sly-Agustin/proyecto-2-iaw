<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Arr;
use Response;
use Exception;
use Request;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception){
        $class = get_class($exception);
        switch($class) {
            case 'Illuminate\Auth\AuthenticationException':
                $guard = Arr::get($exception->guards(), 0);
                switch ($guard) {
                    case 'jefe':
                        $login = 'jefe.login';
                        break;
                    case 'empleado':
                        $login = 'empleado.login';
                        break;
                    default:
                        $login = 'login';
                        break;
                }
                return redirect()->route($login);
        }

        // Para la API
        if ($exception instanceof ModelNotFoundException && $request->wantsJson()) {
            return response()->json([
                'error' => 'Recurso para la API no encontrado'
            ], 404);
        }

        return parent::render($request, $exception);
    }
}
