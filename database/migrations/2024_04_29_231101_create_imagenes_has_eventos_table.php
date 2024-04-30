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
        Schema::create('imagenes_has_eventos', function (Blueprint $table) {
            $table->BigInteger('id_eventos');
            $table->BigInteger('id_imagen');
            $table->foreign('id_eventos')->references('id_eventos')->on('eventos')->onDelete('cascade');
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
        Schema::dropIfExists('imagenes_has_eventos');
    }
};
