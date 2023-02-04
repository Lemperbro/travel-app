<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wisata>
 */
class WisataFactory extends Factory
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
            'kota_id' => fake()->randomDigitNotNull(),
            'tour_type' => fake()->word(),
            'tanggal' => fake()->date(),
            'deskripsi' => fake()->paragraph(100),
            'group_size' => fake()->randomDigit(),
            'nama_wisata' => fake()->sentence(),
            'image' => 'pp.jpg',
            'location' => fake()->city(),
            'harga' => 1000,
            'diboking' => 400
        ];
    }
}
