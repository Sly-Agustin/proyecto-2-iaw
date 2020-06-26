<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCreditCardRequest extends FormRequest
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
            'bancoNumero' => ['required', 'integer', 'digits_between:16,16'],
            'bancoNombre' => ['required'],
        ];
    }

    public function messages(){
        return[
            'bancoNumero.required' => 'El número es obligatorio',
            //'bancoNumero.min' => 'La tarjeta debe tener un mínimo de 16 números',
            //'bancoNumero.max' => 'La tarjeta debe tener un máximo de 16 números',
            'bancoNumero.digits_between' => 'La tarjeta debe estar compuesta por 16 números',
            'bancoNumero.integer' => 'La tarjeta debe tener solo números',
            'bancoNombre.required' => 'El nombre del banco es obligatorio',
        ];
    }
    
    public function response(array $errors){
        return back()
            ->withErrors($errors, 'erroresAgregarTarjeta')
            ->withInput();
    }
}