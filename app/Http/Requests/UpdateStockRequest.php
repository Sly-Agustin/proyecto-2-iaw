<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStockRequest extends FormRequest
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
            'nuevoStock' => ['required', 'integer', 'min:0'],
            'idProducto' => ['required', 'integer']
        ];
    }

    public function messages(){
        return[
            'nuevoStock.required' => 'El nuevo stock es obligatorio',
            'nuevoStock.integer' => 'El stock debe ser un número entero',
            'nuevoStock.min' => 'El nuevo stock debe ser mayor o igual a 0',
            'idProducto.required' => 'Debe seleccionar un producto',
            'idProducto.integer' => 'Clave de producto no válida',
        ];
    }
    
    public function response(array $errors){
        return back()
            ->withErrors($errors, 'erroresCuenta')
            ->withInput();
    }
}
