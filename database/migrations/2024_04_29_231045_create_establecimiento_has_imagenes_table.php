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
        Schema::create('establecimiento_has_imagenes', function (Blueprint $table) {
            $table->BigInteger('id_establecimiento');
            $table->BigInteger('id_imagen');
            $table->foreign('id_establecimiento')->references('id_establecimiento')->on('establecimientos')->onDelete('cascade');
            $table->foreign('id_imagen')->references('id_imagen')->on('imagenes')->onDelete('cascade');
            // Puedes agregar otras columnas según sea necesario
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('establecimiento_has_imagenes');
    }
};
