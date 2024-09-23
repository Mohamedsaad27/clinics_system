<?php

namespace Database\Seeders;

use App\Models\Shift;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shifts = [
            [
                'doctor_id' => 1,
                'clinic_id' => 1,
                'shift_date' => Carbon::now()->format('Y-m-d'),
                'start_time' => '08:00:00',
                'end_time' => '16:00:00',
                'max_patients' => 20,
            ],
            [
                'doctor_id' => 1,
                'clinic_id' => 1,
                'shift_date' => Carbon::now()->addDay()->format('Y-m-d'),
                'start_time' => '08:00:00',
                'end_time' => '16:00:00',
                'max_patients' => 20,
            ],
            [
                'doctor_id' => 1,
                'clinic_id' => 2,
                'shift_date' => Carbon::now()->format('Y-m-d'),
                'start_time' => '10:00:00',
                'end_time' => '18:00:00',
                'max_patients' => 15,
            ],
            [
                'doctor_id' => 1,
                'clinic_id' => 2,
                'shift_date' => Carbon::now()->addDay()->format('Y-m-d'),
                'start_time' => '10:00:00',
                'end_time' => '18:00:00',
                'max_patients' => 15,
            ],
        ];

        foreach ($shifts as $shift) {
            Shift::create($shift);
        }
    }
}
