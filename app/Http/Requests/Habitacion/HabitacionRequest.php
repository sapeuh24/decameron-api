<?php

namespace App\Http\Requests\Habitacion;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HabitacionRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para hacer esta solicitud.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Reglas de validación para la asignación de habitaciones.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'hotel_id' => ['required', 'exists:hoteles,id'],
            'habitaciones' => ['required', 'array', 'min:1'],
            'habitaciones.*.acomodacion_tipo_id' => [
                'required',
                'exists:acomodaciones_tipos,id'
            ],
            'habitaciones.*.cantidad' => ['required', 'integer', 'min:1'],
            'habitaciones' => [function ($attribute, $value, $fail) {
                $combos = [];
                foreach ($value as $habitacion) {
                    $key = $habitacion['acomodacion_tipo_id'];
                    if (isset($combos[$key])) {
                        $fail('No debe haber tipos de habitaciones y acomodaciones repetidas para el mismo hotel.');
                        return;
                    }
                    $combos[$key] = true;
                }
            }]
        ];
    }

    /**
     * Mensajes de error personalizados.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'hotel_id.required' => 'El hotel es obligatorio.',
            'hotel_id.exists' => 'El hotel seleccionado no existe.',

            'habitaciones.required' => 'Debe asignar al menos una habitación.',
            'habitaciones.array' => 'El formato de habitaciones no es válido.',
            'habitaciones.min' => 'Debe asignar al menos una habitación.',

            'habitaciones.*.acomodacion_tipo_id.required' => 'La combinación de acomodación y tipo de habitación es obligatoria.',
            'habitaciones.*.acomodacion_tipo_id.exists' => 'La combinación de acomodación y tipo de habitación no existe.',

            'habitaciones.*.cantidad.required' => 'La cantidad de habitaciones es obligatoria.',
            'habitaciones.*.cantidad.integer' => 'La cantidad de habitaciones debe ser un número entero.',
            'habitaciones.*.cantidad.min' => 'La cantidad de habitaciones debe ser al menos 1.',

            'habitaciones' => 'No debe haber tipos de habitaciones y acomodaciones repetidas para el mismo hotel.'
        ];
    }
}
