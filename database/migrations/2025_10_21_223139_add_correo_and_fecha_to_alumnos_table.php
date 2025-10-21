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
        Schema::table('alumnos', function (Blueprint $table) {
            // Only add columns if they don't exist (prevents duplicate column errors in tests)
            if (! Schema::hasColumn('alumnos', 'fecha_nacimiento')) {
                $table->date('fecha_nacimiento')->nullable()->after('carrera');
            }
            if (! Schema::hasColumn('alumnos', 'correo')) {
                $table->string('correo')->nullable()->unique()->after('fecha_nacimiento');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alumnos', function (Blueprint $table) {
            // Only drop columns if they exist
            if (Schema::hasColumn('alumnos', 'correo')) {
                $table->dropColumn('correo');
            }
            if (Schema::hasColumn('alumnos', 'fecha_nacimiento')) {
                $table->dropColumn('fecha_nacimiento');
            }
        });
    }
};
