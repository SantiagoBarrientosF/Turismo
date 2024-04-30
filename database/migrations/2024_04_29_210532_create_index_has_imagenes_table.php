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
        // Schema::create('indices_has_imagenes', function (Blueprint $table) {
        //     $table->BigInteger('id_index');
        //     $table->BigInteger('id_imagen');
        //     $table->foreign('id_index')->references('id_index')->on('indices')->onDelete('cascade');
        //     $table->foreign('id_imagen')->references('id_imagen')->on('imagenes')->onDelete('cascade');
        //     // Puedes agregar otras columnas según sea necesario
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('index_has_imagenes');
    }
};
