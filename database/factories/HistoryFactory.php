<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\History>
 */
class HistoryFactory extends Factory
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
            'chief_complaint' => fake()->sentence(),
            'cheif_complaint_duration' => fake()->word(),
            'hopi' => fake()->paragraph(),
            'past_medical_history' => fake()->paragraph(),
            'surgical_history' => fake()->paragraph(),
            'family_history' => fake()->paragraph(),
            'drug_history' => fake()->paragraph(),
            'allergy_history' => fake()->paragraph(),
            'social_history' => fake()->paragraph(),
            'history_gpd_g' => fake()->randomElement([1, 2, 3, 0]),
            'history_gpd_p' => fake()->randomElement([1, 2, 3, 0]),
            'history_gpd_a' => fake()->randomElement([1, 2, 3, 0]),
            'history_gpd_d' => fake()->randomElement([1, 2, 3, 0]),
            'history_menstrual' => '',
            'history_edd' => fake()->date(),
            'history_lmp' => fake()->date(),
            'history_gestational_age' => '',
            'note' => '',
            'input_date' => now(),
        ];
    }
}
