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
        Schema::create('excursiones', function (Blueprint $table) {
            $table->id();
            $table->integer('id_categoria');
            $table->text('titulo');
            $table->text('descripcion');
            $table->text('portada');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('excursiones');
    }
};
