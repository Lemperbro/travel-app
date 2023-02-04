<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testi>
 */
class TestiFactory extends Factory
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
            'user_id' => 1,
            'wisata_id' => 1,
            'date' => fake()->date(),
            'deskripsi' => fake()->paragraph(5)
        ];
    }
}
