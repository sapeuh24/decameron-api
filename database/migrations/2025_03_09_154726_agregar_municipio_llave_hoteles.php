<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('hoteles', function (Blueprint $table) {
            $table->dropColumn('ciudad');
            $table->unsignedInteger('municipio_id')->after('direccion');
            $table->foreign('municipio_id')
                  ->references('id_municipio')
                  ->on('municipios')
                  ->onDelete('cascade');
        });


        Schema::table('hoteles', function (Blueprint $table) {
            $table->unique(['nombre', 'municipio_id', 'nit', 'direccion'], 'hoteles_nombre_municipio_id_nit_direccion_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hoteles', function (Blueprint $table) {
            if (Schema::hasIndex('hoteles', 'hoteles_nombre_municipio_id_nit_direccion_unique')) {
                $table->dropUnique('hoteles_nombre_municipio_id_nit_direccion_unique');
            }
            $table->dropForeign(['municipio_id']);
            $table->dropColumn('municipio_id');
            $table->string('ciudad')->after('direccion');
        });
    }
};
