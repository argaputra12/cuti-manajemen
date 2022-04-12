<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pegawai>
 */
class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'nik'=> $this->faker->numberBetween(1,100),
            'no_induk' => $this->faker->numberBetween(1,100),
            'alamat' => $this->faker->address(),
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'telepon' => $this->faker->phoneNumber(),
            // 'id_departemen' => $this->faker->numberBetween(1,100),
        ];
    }
}
