<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AcomodacionesSeeder::class,
            TiposHabitacionSeeder::class,
            AcomodacionesTiposSeeder::class,
            DepartarmentosTableSeeder::class,
            MunicipiosTableSeeder::class,
            HotelesTableSeeder::class,
            HabitacionesTableSeeder::class,
        ]);
    }
}
