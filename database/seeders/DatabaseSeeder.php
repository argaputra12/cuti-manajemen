<?php

namespace Database\Seeders;

use App\Models\Departemen;
use App\Models\User;
use App\Models\Pegawai;
use App\Models\RiwayatCuti;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        // Departemen::factory(10)->create(); // <-- This line is
        // Pegawai::factory(10)->create(); // <-- This line is added
        // RiwayatCuti::factory(10)->create(); // <-- This line is added
        // $this->call([
        //     PegawaiSeeder::class,
        // ]);
    }
}
