<?php

namespace App\Http\Requests\Hotel;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateHotelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => [
                'sometimes',
                'string',
                'max:100',
                Rule::unique('hoteles')->ignore($this->route('hotel'))->where(function ($query) {
                    return $query->where('municipio_id', $this->municipio_id)
                                 ->where('nit', $this->nit)
                                 ->where('direccion', $this->direccion);
                }),
            ],
            'direccion' => 'sometimes|string|max:200',
            'municipio_id' => [
                'sometimes',
                'integer',
                Rule::exists('municipios', 'id_municipio'),
            ],
            'nit' => 'sometimes|string|max:20',
            'numero_habitaciones' => 'sometimes|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'nombre.string' => 'El nombre del hotel debe ser una cadena de texto.',
            'nombre.max' => 'El nombre del hotel no puede tener más de 100 caracteres.',
            'nombre.unique' => 'Ya existe un hotel con el mismo nombre, NIT, municipio y dirección.',

            'direccion.string' => 'La dirección del hotel debe ser una cadena de texto.',
            'direccion.max' => 'La dirección del hotel no puede tener más de 200 caracteres.',

            'municipio_id.integer' => 'El ID del municipio debe ser un número entero.',
            'municipio_id.exists' => 'El municipio seleccionado no existe.',

            'nit.string' => 'El NIT del hotel debe ser una cadena de texto.',
            'nit.max' => 'El NIT del hotel no puede tener más de 20 caracteres.',

            'numero_habitaciones.integer' => 'El número de habitaciones debe ser un número entero.',
            'numero_habitaciones.min' => 'El número de habitaciones debe ser al menos 1.',
        ];
    }
}
