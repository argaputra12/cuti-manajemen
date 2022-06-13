<?php

namespace Database\Seeders;

use App\Models\JenisCuti;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisCutiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $jenis_cutis = [
            ['nama' => 'Cuti Besar'],
            ['nama' => 'Cuti Tahunan'],
            ['nama' => 'Cuti Sakit'],
            ['nama' => 'Cuti Melahirkan'],
            ['nama' => 'Cuti karena Alasan Penting'],
            ['nama' => 'Cuti di luar tanggungan perusahaan']
        ];

        foreach ($jenis_cutis as $jenis_cuti) {
            JenisCuti::create($jenis_cuti);
        }
    }
}
