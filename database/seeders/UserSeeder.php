<?php

namespace Database\Seeders;
// when installed via composer
require_once 'vendor/autoload.php';


use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // konfigurasi cuti tahun ini
        $konfigurasi_cutis_id = DB::table('konfigurasi_cutis')->where('tahun', now()->format('Y'))->first()->id;

        $inserted_data = [
            [
                'nik' => '12345678934235',
                'nip' => '1234',
                'nama' => 'Admin',
                'alamat' => 'Jl. Raya',
                'jenis_kelamin' => 'laki-laki',
                'department_id' => 1,
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
                'telepon' => '082132557027',
                'is_admin' => 1,
                'sisa_cuti' => 99,
                'konfigurasi_cutis_id' => $konfigurasi_cutis_id,
            ],
            [
                'nik' => '12345678907542',
                'nip' => '7890',
                'nama' => 'User',
                'alamat' => 'Jl. Raya',
                'jenis_kelamin' => 'laki-laki',
                'department_id' => 1,
                'telepon' => '082132557027',
                'email' => 'user@user.com',
                'password' => bcrypt('user'),
                'is_admin' => 0,
                'sisa_cuti' => 99,
                'konfigurasi_cutis_id' => $konfigurasi_cutis_id,
            ]
        ];

        foreach ($inserted_data as $data) {
            User::create($data);
        }

        // Jumalh cuti maksimal tahun ini
        $jumlah_cuti_maksimum = DB::table('konfigurasi_cutis')->where('tahun', now()->format('Y'))->first()->jumlah_cuti_maksimum;

        // Jumlah cuti beersama tahun ini
        $jumlah_cuti_bersama = DB::table('konfigurasi_cutis')->where('tahun', now()->format('Y'))->first()->jumlah_cuti_bersama;



        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 50; $i++){

            // insert data user dengan faker
            DB::table('users')
            ->insert([
                'nip' => $faker->unique()->numberBetween(1000, 9999),
                'nik' => $faker->unique()->numberBetween(100000000000000, 9999999999999999),
                'nama' => $faker->name(),
                'alamat' => $faker->address(),
                'jenis_kelamin' => $faker->randomElement(['laki-laki', 'perempuan']),
                'department_id' => $faker->numberBetween(1, 6),
                'telepon' => $faker->phoneNumber(),
                'email' => $faker->unique()->email(),
                'konfigurasi_cutis_id' => $konfigurasi_cutis_id,
                'password' => bcrypt('password'),
                'is_admin' => $faker->numberBetween(0, 1),
                'sisa_cuti' => $jumlah_cuti_maksimum-$jumlah_cuti_bersama,
            ]);
        }
    }
}
