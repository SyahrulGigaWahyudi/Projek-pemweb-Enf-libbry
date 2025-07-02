<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::table('recommendations', function (Blueprint $table) {
        $table->string('publisher')->nullable();
        $table->string('year')->nullable();
        $table->string('cover')->nullable(); // untuk gambar rekomendasi
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recommendations', function (Blueprint $table) {
            //
        });
    }
};
