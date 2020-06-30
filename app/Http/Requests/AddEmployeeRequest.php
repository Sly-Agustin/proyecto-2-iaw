<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'usuario' => ['required', 'unique:empleados,username'] ,
            'contrasenia' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => ['required', 'unique:empleados,email'],
        ];
    }

    public function messages(){
        return[
            'usuario.required' => 'El usuario es obligatorio',
            'usuario.unique' => 'El usuario ya existe, elija un nuevo nombre de usuario',
            'contrasenia.required' => 'La contraseña es obligatoria',
            'nombre.required' => 'El nombre es obligatorio',
            'apellido.required' => 'El apellido es obligatorio',
            'email.required' => 'El mail es obligatorio messages',
            'email.unique' => 'Ya existe una cuenta registrada con esta direccion de email',
        ];
    }
    
    public function response(array $errors){
        return back()
            ->withErrors($errors, 'erroresCuenta')
            ->withInput();
    }
}
