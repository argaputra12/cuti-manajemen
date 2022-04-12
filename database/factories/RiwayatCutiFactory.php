<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Riwayat_Cuti>
 */
class RiwayatCutiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'status_cuti' => $this->faker->randomElement(['Diterima', 'Ditolak', 'Diproses']),
            // 'path_bukti_pengajuan' => $this->faker->imageUrl(),
            'tgl_awal_cuti' => $this->faker->date(),
            'tgl_akhir_cuti' => $this->faker->date(),
        ];
    }
}
