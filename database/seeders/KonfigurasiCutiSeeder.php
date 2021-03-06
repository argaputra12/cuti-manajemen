<?php

namespace Database\Seeders;
// when installed via composer
require_once 'vendor/autoload.php';

use Faker\Factory as Faker;
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
        $faker = Faker::create('id_ID');

        for($i = 20; $i <= 27; $i++){
            KonfigurasiCuti::create([
                'tahun' => $i + 2000,
                'jumlah_cuti_maksimum' => $faker->numberBetween(40, 50),
                'jumlah_cuti_bersama' => $faker->numberBetween(20, 29),
            ]);
        }


    }
}
