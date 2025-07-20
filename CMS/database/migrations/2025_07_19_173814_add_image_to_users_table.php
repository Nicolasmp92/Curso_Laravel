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
        Schema::table('users', function (Blueprint $table) {

            $table->string('image')->nullable()->after('email_verified_at');
            //$table->string('image') crea una columna tipo varchar en bd para almacentar la ruta de la imagen
            // ->nullable() permite que el campo quede sin nada en caso de que el usuario no quiera poner una foto de perfil
            // >after('password') Esto es algo opcional, pero es donde se quiere ubicar la nueva columna en este caso despues de email_verified_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('image');
            // se invierte la migracion
        });
    }
};
