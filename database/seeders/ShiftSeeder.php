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
                'shift_month' => Carbon::now()->format('Y-m'),
                'shift_day_during_month' => '2003-02',
                'start_time' => '08:00:00',
                'end_time' => '16:00:00',
                'max_patients' => 20,
                'price_appoinment' => 100,
            ],
            [
                'doctor_id' => 1,
                'clinic_id' => 1,
                'shift_month' => Carbon::now()->addDay()->format('Y-m'),
                'shift_day_during_month' => '2003-02',
                'start_time' => '08:00:00',
                'end_time' => '16:00:00',
                'max_patients' => 20,
                'price_appoinment' => 100,
            ],
            [
                'doctor_id' => 1,
                'clinic_id' => 2,
                'shift_month' => Carbon::now()->format('Y-m'),
                'shift_day_during_month' => '2003-02',
                'start_time' => '10:00:00',
                'end_time' => '18:00:00',
                'max_patients' => 15,
                'price_appoinment' => 120,
            ],
            [
                'doctor_id' => 1,
                'clinic_id' => 2,
                'shift_month' => Carbon::now()->addDay()->format('Y-m'),
                'shift_day_during_month' => '2003-02',
                'start_time' => '10:00:00',
                'end_time' => '18:00:00',
                'max_patients' => 15,
                'price_appoinment' => 120,
            ],
        ];

        foreach ($shifts as $shift) {
            Shift::create($shift);
        }
    }
}
