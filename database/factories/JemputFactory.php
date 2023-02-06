<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jemput>
 */
class JemputFactory extends Factory
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
            'wisata_id' => fake()->randomDigitNotZero(),
            'lokasi' => fake()->city(),
            'harga' => fake()->randomDigitNotZero()
        ];
    }
}
