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
        Schema::create('destinasi_medsos', function (Blueprint $table) {
            $table->id(); // Primary key auto-increment
            $table->unsignedBigInteger('id_destinasi'); // Kolom foreign key
            $table->string('website_medsos', 255);      // Kolom untuk website medsos
            $table->timestamps();

            // Definisi foreign key
            $table->foreign('id_destinasi')
                ->references('id_destinasi')  // Referensi ke kolom id_destinasi di tabel destinasi_wisata
                ->on('destinasi_wisata')     // Nama tabel parent
                ->onDelete('cascade')        // Hapus otomatis jika parent dihapus
                ->onUpdate('cascade');       // Update otomatis jika parent diubah
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinasi_medsos');
    }
};