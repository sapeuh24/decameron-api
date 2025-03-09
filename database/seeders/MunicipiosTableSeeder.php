<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MunicipiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sqlFile = public_path('municipios.sql');

        if (File::exists($sqlFile)) {
            $sql = File::get($sqlFile);

            DB::unprepared($sql);

            $this->command->info('Datos de municipios insertados correctamente.');
        } else {
            $this->command->error('El archivo municipios.sql no existe en la carpeta public.');
        }
    }
}
