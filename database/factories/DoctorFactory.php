<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Specialty;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'department_id' => Department::factory(),
            'specialty_id' => Specialty::factory(),
            'experience_years' => $this->faker->numberBetween(1, 30),
            'qualification' => $this->faker->sentence,
        ];
    }
}
