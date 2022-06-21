<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konfigurasi_cutis', function (Blueprint $table) {
            $table->id();
            $table->year('tahun');
            $table->integer('jumlah_cuti_maksimum');
            $table->integer('jumlah_cuti_bersama');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konfigurasi_cutis');
    }
};
