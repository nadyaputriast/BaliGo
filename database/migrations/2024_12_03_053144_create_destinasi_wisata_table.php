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
        Schema::create('destinasi_wisata', function (Blueprint $table) {
            $table->id('id_destinasi'); // Primary key
            $table->string('nama_destinasi', 255);
            $table->enum('kabupaten_kota', [
                'Badung', 'Bangli', 'Buleleng', 'Denpasar', 'Gianyar',
                'Jembrana', 'Karangasem', 'Klungkung', 'Tabanan'
            ]);
            $table->integer('harga_tiket');
            $table->float('rating_destinasi')->nullable(); // Rating bisa null
            $table->string('contact_person', 255);
            $table->string('foto_destinasi', 255);
            $table->string('alamat_lengkap', 255);
            $table->string('link_maps', 255);
            $table->enum('jenis_wisata', [
                'Alam', 'Belanja', 'Budaya & Rohani', 'Keluarga & Edukasi', 'Kuliner',
                'Malam & Hiburan', 'Seni & Kerajinan', 'Petualangan', 'Relaksasi & Kesehatan'
            ]);
            $table->string('reservasi', 255);
            $table->time('jam_buka');
            $table->time('jam_tutup');
            $table->timestamps(); // Menambahkan created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinasi_wisata');
    }
};