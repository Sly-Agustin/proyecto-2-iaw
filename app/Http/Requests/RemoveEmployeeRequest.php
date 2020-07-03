<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RemoveEmployeeRequest extends FormRequest
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
            'idEmpleado' => 'required' ,
        ];
    }

    public function messages(){
        return[
            'idEmpleado.required' => 'Es necesario seleccionar un empleado',
        ];
    }
    
    public function response(array $errors){
        return back()
            ->withErrors($errors, 'erroresCuenta')
            ->withInput();
    }
}
