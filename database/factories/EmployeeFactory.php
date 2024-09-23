<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => User::factory(),
            'department_id' => Department::factory(),
            'role' => $this->faker->randomElement(['receptionist', 'nurse']),
            'salary' => $this->faker->numberBetween(1000, 10000),
            'hire_date' => $this->faker->date,
        ];
    }
}
