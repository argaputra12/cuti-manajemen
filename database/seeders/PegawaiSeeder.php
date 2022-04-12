<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pegawais')->insert([
            'nik' => '123456789',
            'no_induk' => '123456789',
            'nama' => 'Pegawai 1',
            'alamat' => 'Jl. Pegawai 1',
            'jenis_kelamin' => 'L',
            'telepon' => '123456789',
        ]);
    }
}
