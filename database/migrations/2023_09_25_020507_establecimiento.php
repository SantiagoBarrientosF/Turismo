<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('establecimientos', function (Blueprint $table) {
            $table->id('id_establecimiento');
            $table->string('nombre');
            $table->string('localidad');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('descripcion');
            $table->string('tipo_negocio');
            $table->string('propietario');
            $table->integer('id_usuario');
            $table->integer('id_estado');
            $table->string('logo');
            $table->string('redes_id');
            $table->string('detalle');

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
