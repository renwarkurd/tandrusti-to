<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $marital_status = fake()->randomElement(['married', 'single', 'divorced']);

        return [
            "user_id" => 1,
            "city_id" => fake()->randomElement([1, 2, 3]),
            "first_name" => fake()->name(),
            "middle_name" => fake()->name(),
            "last_name" => fake()->name(),
            "code" => fake()->randomNumber(3),
            "code_type" => fake()->randomElement([1, 2]),
            "gender" => fake()->randomElement([1, 2]),
            "dob_year" => fake()->year(),
            "dob_month" => fake()->month(),
            "dob_day" => fake()->dayOfMonth(),
            "occupation" => fake()->jobTitle(),
            "address" => fake()->address(),
            "contact_1" => fake()->phoneNumber(),
            "contact_2" => fake()->phoneNumber(),
            "marital_status" => $marital_status,
            "blood_group" => fake()->randomElement(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB-', 'AB+']),
            "spouse_fullname" => $marital_status == 'single' ? null : fake()->name(),
            "spouse_dob" => $marital_status == 'single' ? null : fake()->date(),
            "spouse_contact" => $marital_status == 'single' ? null : fake()->phoneNumber(),
            "spouse_occupation" => $marital_status == 'single' ? null : fake()->jobTitle(),
            "input_date" => now(),
        ];
    }
}
