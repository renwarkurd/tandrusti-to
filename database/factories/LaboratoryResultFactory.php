<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LaboratoryResult>
 */
class LaboratoryResultFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'patient_id' => fake()->numberBetween(1, 30),
            'filename' => fake()->word() . '.pdf',
            'input_date' => now(),
        ];
    }
}
