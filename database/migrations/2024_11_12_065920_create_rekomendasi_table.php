<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekomendasiTable extends Migration
{
    public function up()
    {
        Schema::create('rekomendasi', function (Blueprint $table) {
            $table->id('id_rekomendasi');
            $table->integer('maks_budget');
            $table->json('kabupaten_kota');
            $table->integer('banyak_tempat');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rekomendasi');
    }
}