<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewSaleRequest extends FormRequest
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
            'cantidadCompra' => ['required', 'integer', 'between:1,5'],
        ];
    }

    public function messages(){
        return[
            'idProducto.required' => 'Debe seleccionar un producto',
            'idProducto.integer' => 'Clave de producto no válida',
            'cantidadCompra.required' => 'Es necesario seleccionar una cantidad a comprar',
            'cantidadCompra.between' => 'La cantidad a comprar solo puede ser entre 1 y 5',
            'cantidadCompra.integer' => 'La cantidad de elementos a comprar debe ser un numero',
        ];
    }
    
    public function response(array $errors){
        return back()
            ->withErrors($errors, 'erroresCompra')
            ->withInput();
    }
}