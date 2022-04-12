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
            $table->set('status_cuti', ['Diterima', 'Ditolak', 'Diproses']);
            // $table->boolean('path_bukti_pengajuan');
            $table->date('tgl_awal_cuti');
            $table->date('tgl_akhir_cuti');
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
        Schema::dropIfExists('riwayat__cutis');
    }
};
