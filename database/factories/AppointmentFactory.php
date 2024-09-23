<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Shift;
use App\Models\Clinic;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patient_id' => User::factory(),
            'doctor_id' => Doctor::factory(),
            'shift_id' => Shift::factory(),
            'clinic_id' => Clinic::factory(),
            'appointment_date' => $this->faker->date,
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'cancelled']),
            'sms_sent' => $this->faker->boolean,
        ];
    }
}
