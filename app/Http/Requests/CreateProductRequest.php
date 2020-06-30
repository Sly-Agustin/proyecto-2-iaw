<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'productoNombre' => 'required',
            'productoDescripcion' => 'required',
            'productoDescripcionLarga' => 'required',
            'productoTipo' => 'required',
            'productoUrl' => 'required',
            'productoPrecio' => ['required', 'integer', 'min:0'],
            'productoStock' => ['required', 'integer', 'min:0'],
            'imagen' => ['file', 'image', 'max:5000'],
        ];
        /*return tap(
            request()->validate([
                'productoNombre' => 'required',
                'productoDescripcion' => 'required',
                'productoDescripcionLarga' => 'required',
                'productoTipo' => 'required',
                'productoUrl' => 'required',
                'productoPrecio' => ['required', 'integer', 'min:0'],
                'productoStock' => ['required', 'integer', 'min:0']
            ]), function(){
                if (request()->hasFile('imagen')){
                    request()->validate([
                        'imagen' => 'file|image|max:5000'
                    ]);
                }
            }
        );*/
    }

    public function messages(){
        return[
            'productoNombre.required' => 'El nombre es obligatorio',
            'productoDescripcion.required' => 'La descripcion es obligatoria',
            'productoDescripcionLarga.required' => 'Las especificaciones son obligatorias',
            'productoTipo.required' => 'El tipo/categoria es obligatorio',
            'productoUrl.required' => 'La URL del fabricante es obligatoria',
            'productoPrecio.required' => 'El precio es obligatorio',
            'productoPrecio.integer' => 'El precio debe ser un número entero',
            'productoPrecio.min' => 'El precio debe ser un número positivo',
            'productoStock.required' => 'El stock es obligatorio',
            'productoStock.integer' => 'El stock debe ser un número entero',
            'productoStock.min' => 'El stock debe ser un número positivo',
            'imagen.file' => 'Lo subido no es un archivo',
            'imagen.image' => 'El archivo no es una imagen',
            'imagen.max' => 'Imagen demasiado pesada, la imagen puede pesar hasta 5 MB',
        ];
    }
    
    public function response(array $errors){
        return back()
            ->withErrors($errors, 'erroresCuenta')
            ->withInput();
    }
}
