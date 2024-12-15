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
        Schema::table('tesis', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('id_estudiante_companero')->nullable();
            $table->foreign('id_estudiante_companero')->references('id_usuario')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tesis', function (Blueprint $table) {
            //
            $table->dropForeign(['id_estudiante_companero']);
            $table->dropColumn('id_estudiante_companero');
        });
    }
};