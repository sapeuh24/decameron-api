<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcomodacionesTiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('acomodaciones_tipos')->insert([
            // Estándar: Sencilla y Doble
            ['tipo_habitacion_id' => 1, 'acomodacion_id' => 1],
            ['tipo_habitacion_id' => 1, 'acomodacion_id' => 2],

            // Junior: Triple y Cuádruple
            ['tipo_habitacion_id' => 2, 'acomodacion_id' => 3],
            ['tipo_habitacion_id' => 2, 'acomodacion_id' => 4],

            // Suite: Sencilla, Doble y Triple
            ['tipo_habitacion_id' => 3, 'acomodacion_id' => 1],
            ['tipo_habitacion_id' => 3, 'acomodacion_id' => 2],
            ['tipo_habitacion_id' => 3, 'acomodacion_id' => 3],
        ]);

    }
}
