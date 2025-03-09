<?php

namespace App\Http\Requests\Hotel;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHotelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'sometimes|string|max:100',
            'direccion' => 'sometimes|string|max:200',
            'ciudad' => 'sometimes|string|max:100',
            'nit' => 'sometimes|string|max:20',
            'numero_habitaciones' => 'sometimes|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'nombre.string' => 'El nombre del hotel debe ser una cadena de texto.',
            'nombre.max' => 'El nombre del hotel no puede tener más de 100 caracteres.',

            'direccion.string' => 'La dirección del hotel debe ser una cadena de texto.',
            'direccion.max' => 'La dirección del hotel no puede tener más de 200 caracteres.',

            'ciudad.string' => 'La ciudad del hotel debe ser una cadena de texto.',
            'ciudad.max' => 'La ciudad del hotel no puede tener más de 100 caracteres.',

            'nit.string' => 'El NIT del hotel debe ser una cadena de texto.',
            'nit.max' => 'El NIT del hotel no puede tener más de 20 caracteres.',

            'numero_habitaciones.integer' => 'El número de habitaciones debe ser un número entero.',
            'numero_habitaciones.min' => 'El número de habitaciones debe ser al menos 1.',
        ];
    }
}