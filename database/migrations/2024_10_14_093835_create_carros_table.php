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
        Schema::create('carros', function (Blueprint $table) {
            $table->id(); // columna id
            $table->string('modelo', 80); // columna modelo
            $table->string('color', 50); // columna color
            $table->decimal('precio', 10, 2); // columna precio con dos decimales
            $table->string('transmision', 50); // columna transmision
            $table->string('submarca', 80); // columna submarca
            $table->unsignedBigInteger('marca_id'); // columna marca_id
            $table->string('foto', 80); // columna foto (ruta de la imagen)
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carros');
    }
};
