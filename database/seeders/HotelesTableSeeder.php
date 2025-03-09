<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelesTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    */
    public function run(): void
    {
        DB::table('hoteles')->insert([
            'nombre' => 'DECAMERON CARTAGENA',
            'direccion' => 'CALLE 23 58-25',
            'municipio_id' => 171,
            'nit' => '12345678-9',
            'numero_habitaciones' => 42,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
