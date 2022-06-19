<?php

namespace Database\Seeders;

use App\Models\KonfigurasiCuti;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KonfigurasiCutiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $konfigurasi_cutis =[
            [
                'tahun' => '2022',
                'jumlah_cuti_maksimum' => '12',
                'jumlah_cuti_bersama' => '6'
            ],
            [
                'tahun' => '2023',
                'jumlah_cuti_maksimum' => '22',
                'jumlah_cuti_bersama' => '13',
            ] 
        ];

        foreach ($konfigurasi_cutis as $item) {
            KonfigurasiCuti::create($item);
        }


    }
}
