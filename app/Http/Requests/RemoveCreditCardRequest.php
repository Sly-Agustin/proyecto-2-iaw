<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RemoveCreditCardRequest extends FormRequest
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
            'tarjeta' => ['required', 'integer'],
        ];
    }

    public function messages(){
        return[
            'tarjeta.required' => 'Debe borrar una tarjeta',
            'tarjeta.integer' => 'La id de la tarjeta debe ser un entero',
        ];
    }
    
    public function response(array $errors){
        return back()
            ->withErrors($errors, 'erroresAgregarTarjeta')
            ->withInput();
    }
}