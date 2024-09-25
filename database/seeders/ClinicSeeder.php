<?php

namespace Database\Seeders;

use App\Models\Clinic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clinics = [
            ['clinic_name' => 'Cairo Clinic', 'location' => '123 Nile Street, Cairo, Egypt', 'contact_info' => 'cairo@example.com', 'category_id' => 1,'department_id' => 1, 'image' => 'cairo.jpg'],
            ['clinic_name' => 'Alexandria Clinic', 'location' => '456 Mediterranean Road, Alexandria, Egypt', 'contact_info' => 'alexandria@example.com', 'category_id' => 2,'department_id' => 2, 'image' => 'alexandria.jpg'],
            ['clinic_name' => 'Giza Clinic', 'location' => '789 Pyramid Avenue, Giza, Egypt', 'contact_info' => 'giza@example.com', 'category_id' => 3, 'department_id' => 3, 'image' => 'giza.jpg'],
        ];

        foreach ($clinics as $clinic) {
            Clinic::create($clinic);
        }
    }
}
