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
            'nama_wisata' => fake()->sentence(),
            'image' => 'post-image/pp.jpg',
            'location' => fake()->city(),
            'diboking' => 400
        ];
    }
}
