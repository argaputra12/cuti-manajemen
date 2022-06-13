<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Insert data

        $departments = [
            ['nama' => 'Informatika'],
            ['nama' => 'Matematika'],
            ['nama' => 'Fisika'],
            ['nama' => 'Biologi'],
            ['nama' => 'Statistika'],
            ['nama' => 'Kimia']
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
        
    }
}
