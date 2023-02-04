<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Itenerary>
 */
class IteneraryFactory extends Factory
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
            'wisata_id' => 1,
            'agenda' => fake()->city(),
            'deskripsi' => fake()->paragraph(20)
        ];
    }
}
