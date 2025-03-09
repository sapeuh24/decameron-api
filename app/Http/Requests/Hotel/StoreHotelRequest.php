<?php

namespace App\Http\Requests\Hotel;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreHotelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => [
                'required',
                'string',
                'max:100',
                Rule::unique('hoteles')->where(function ($query) {
                    return $query->where('municipio_id', $this->municipio_id)
                                 ->where('nit', $this->nit)
                                 ->where('direccion', $this->direccion);
                }),
            ],
            'direccion' => 'required|string|max:200',
            'municipio_id' => [
                'required',
                'integer',
                Rule::exists('municipios', 'id_municipio'),
            ],
            'nit' => 'required|string|max:20',
            'numero_habitaciones' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre del hotel es obligatorio.',
            'nombre.string' => 'El nombre del hotel debe ser una cadena de texto.',
            'nombre.max' => 'El nombre del hotel no puede tener más de 100 caracteres.',
            'nombre.unique' => 'Ya existe un hotel con el mismo nombre, NIT, municipio y dirección.',

            'direccion.required' => 'La dirección del hotel es obligatoria.',
            'direccion.string' => 'La dirección del hotel debe ser una cadena de texto.',
            'direccion.max' => 'La dirección del hotel no puede tener más de 200 caracteres.',

            'municipio_id.required' => 'La ciudad del hotel es obligatoria.',
            'municipio_id.integer' => 'El ID del municipio debe ser un número entero.',
            'municipio_id.exists' => 'El municipio seleccionado no existe.',

            'nit.required' => 'El NIT del hotel es obligatorio.',
            'nit.string' => 'El NIT del hotel debe ser una cadena de texto.',
            'nit.max' => 'El NIT del hotel no puede tener más de 20 caracteres.',

            'numero_habitaciones.required' => 'El número de habitaciones es obligatorio.',
            'numero_habitaciones.integer' => 'El número de habitaciones debe ser un número entero.',
            'numero_habitaciones.min' => 'El número de habitaciones debe ser al menos 1.',
        ];
    }
}
