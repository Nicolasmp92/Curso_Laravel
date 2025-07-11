<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ejemplo', function (Blueprint $table) {
            // por comvencion, todas las tablas tienen ID y timestamps por defe
            $table->id('id');
            $table->integer('usuario_id')->unsigned();
            $table->string('titulo');
            $table->text('categoria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejemplo');
    }
};
