<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supir>
 */
class SupirFactory extends Factory
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
            'nama' => fake()->name(),
            'no_tlpn' => fake()->numberBetween(),
            'alamat' => fake()->city(),
            'umur' => fake()->randomDigitNotZero()
        ];
    }
}
