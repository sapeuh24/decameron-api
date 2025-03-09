<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class HabitacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('habitaciones')->insert([
            [
                'hotel_id' => 1,
                'acomodacion_tipo_id' => 1, // Sencilla
                'cantidad' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hotel_id' => 1,
                'acomodacion_tipo_id' => 3, // Triple
                'cantidad' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hotel_id' => 1,
                'acomodacion_tipo_id' => 2, // Doble
                'cantidad' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
