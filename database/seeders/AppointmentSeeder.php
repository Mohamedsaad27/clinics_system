<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Appointment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $appointments = [
            [
                'patient_id' => 1,
                'doctor_id' => 1,
                'shift_id' => 1,
                'clinic_id' => 1,
                'appointment_date' => Carbon::now()->format('Y-m-d'),
                'status' => 'pending',
                'sms_sent' => false,
            ],
            [
                'patient_id' => 1,
                'doctor_id' => 1,
                'shift_id' => 2,
                'clinic_id' => 2,
                'appointment_date' => Carbon::now()->format('Y-m-d'),
                'status' => 'pending',
                'sms_sent' => false,
            ],
            [
                'patient_id' => 1,
                'doctor_id' => 1,
                'shift_id' => 3,
                'clinic_id' => 3,
                'appointment_date' => Carbon::now()->format('Y-m-d'),
                'status' => 'pending',
                'sms_sent' => false,
            ],
        ];

        foreach ($appointments as $appointment) {
            Appointment::create($appointment);
        }
    }
}
