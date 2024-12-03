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
        Schema::create('ulasan', function (Blueprint $table) {
            $table->id('id_ulasan');  // Primary key auto-increment
            $table->date('tanggal_ulasan');  // Kolom tanggal ulasan
            $table->string('isi_ulasan', 255);  // Kolom untuk isi ulasan
            $table->float('rating');  // Kolom rating
            $table->string('foto_ulasan', 255)->nullable();  // Kolom foto ulasan, nullable jika tidak ada foto
            $table->unsignedBigInteger('id_user');  // Foreign key untuk user
            $table->unsignedBigInteger('id_destinasi');  // Foreign key untuk destinasi wisata
            $table->timestamps();  // Kolom created_at dan updated_at

            // Definisi foreign key untuk kolom id_destinasi yang mengacu pada tabel destinasi_wisata
            $table->foreign('id_destinasi')
                ->references('id_destinasi')
                ->on('destinasi_wisata')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            // Definisi foreign key untuk kolom id_user yang mengacu pada tabel users
            $table->foreign('id_user')
                ->references('id_user')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasan');
    }
};