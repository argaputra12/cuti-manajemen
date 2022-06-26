<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        $inserted_data = [
            [
                'nik' => '123456789',
                'nip' => '123456789',
                'nama' => 'Admin',
                'alamat' => 'Jl. Raya',
                'jenis_kelamin' => 'laki-laki',
                'department_id' => 1,
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
                'is_admin' => 1,
                'sisa_cuti' => 99,
            ],
            [
                'nik' => '1234567890',
                'nip' => '1234567890',
                'nama' => 'User',
                'alamat' => 'Jl. Raya',
                'jenis_kelamin' => 'laki-laki',
                'department_id' => 1,
                'email' => 'user@user.com',
                'password' => bcrypt('user'),
                'is_admin' => 0,
                'sisa_cuti' => 99,
            ]
        ];

        foreach ($inserted_data as $data) {
            User::create($data);
        }
    }
}
