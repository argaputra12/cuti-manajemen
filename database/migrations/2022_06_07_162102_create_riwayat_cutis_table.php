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
        Schema::create('riwayat_cutis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('jenis_cuti_id');
            $table->foreign('jenis_cuti_id')->references('id')->on('jenis_cutis');
            $table->enum('status_cuti', ['Waiting', 'Approved', 'Refused'])->default('Waiting');
            $table->string('alasan_cuti');
            $table->integer('durasi_cuti');
            // $table->string('path_bukti_pengajuan');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->unsignedBigInteger('konfigurasi_cutis_id');
            $table->foreign('konfigurasi_cutis_id')->references('id')->on('konfigurasi_cutis');
            $table->timestamps('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_cutis');
    }
};
