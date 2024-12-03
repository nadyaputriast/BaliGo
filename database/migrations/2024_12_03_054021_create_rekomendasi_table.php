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
        Schema::create('rekomendasi', function (Blueprint $table) {
            $table->id('id_rekomendasi'); // Primary key dengan tipe BIGINT UNSIGNED
            $table->integer('maks_budget'); // Maksimal budget (int)
            $table->json('kabupaten_kota'); // Data kabupaten/kota dalam format JSON
            $table->integer('banyak_tempat'); // Banyak tempat (int)
            $table->timestamps(); // Menambahkan created_at dan updated_at dengan NULLABLE default
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekomendasi');
    }
};
