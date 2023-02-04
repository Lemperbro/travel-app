<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pemesanan>
 */
class PemesananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //

            'wisata_id' => fake()->randomDigitNotNull(),
            'user_id' => fake()->randomDigitNotNull(),
            'kendaraan_id' => fake()->randomDigitNotNull(),
            'guide_id' => fake()->randomDigitNotNull(),
            'pembayaran' => fake()->word(),
        ];
    }
}
