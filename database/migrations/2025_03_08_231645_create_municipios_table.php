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
        Schema::create('municipios', function (Blueprint $table) {
            $table->unsignedInteger('id_municipio', 6)->autoIncrement();
            $table->string('municipio', 255)->default('');
            $table->unsignedTinyInteger('estado');
            $table->unsignedTinyInteger('departamento_id');
            $table->foreign('departamento_id')
                  ->references('id_departamento')
                  ->on('departamentos')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('municipios');
    }
};
