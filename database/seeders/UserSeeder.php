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
                'nama' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
                'is_admin' => 1,
            ],
            [
                'nama' => 'User',
                'email' => 'user@user.com',
                'password' => bcrypt('user'),
                'is_admin' => 0,
            ]
        ];

        foreach ($inserted_data as $data) {
            User::create($data);
        }
    }
}
