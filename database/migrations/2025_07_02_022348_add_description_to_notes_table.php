<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migrasi.
     */
    public function up(): void
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->text('description')->nullable()->after('chapter');
        });
    }

    /**
     * Membatalkan migrasi.
     */
    public function down(): void
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
};
