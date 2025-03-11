<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class AcomodacionTipoRepository
{
    /**
     * Obtener todas las relaciones entre tipos de habitación y acomodaciones.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getAcomodacionesTipos()
    {
        return DB::table('acomodaciones_tipos')
            ->join('tipos_habitacion', 'acomodaciones_tipos.tipo_habitacion_id', '=', 'tipos_habitacion.id')
            ->join('acomodaciones', 'acomodaciones_tipos.acomodacion_id', '=', 'acomodaciones.id')
            ->select(
                'acomodaciones_tipos.id',
                'tipos_habitacion.id as tipo_habitacion_id',
                'tipos_habitacion.nombre as tipo_habitacion_nombre',
                'acomodaciones.id as acomodacion_id',
                'acomodaciones.nombre as acomodacion_nombre'
            )
            ->get();
    }
}
