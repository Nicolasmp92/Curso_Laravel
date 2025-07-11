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
        Schema::table('rol_user', function (Blueprint $table) {
            Schema::rename('users_rols', 'rol_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rol_user', function (Blueprint $table) {
            Schema::rename('rol_user', 'users_rols');
        });
    }
};
