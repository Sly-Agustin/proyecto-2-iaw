<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModifyProductRequest extends FormRequest
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
            'idProducto' => ['required', 'integer'],
        ];
    }

    public function messages(){
        return[
            'idProducto.required' => 'No se ha seleccionado ningún producto',
            'idProducto.integer' => 'La clave del producto no es válida, debe ser un entero'
        ];
    }
    
    public function response(array $errors){
        return back()
            ->withErrors($errors, 'erroresCuenta')
            ->withInput();
    }
}
