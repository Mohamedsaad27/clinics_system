<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['name' => 'Cardiology'],
            ['name' => 'Neurology'],
            ['name' => 'Orthopedics'],
            ['name' => 'Pediatrics'],
            ['name' => 'Dermatology'],
            ['name' => 'Oncology'],
            ['name' => 'Gastroenterology'],
            ['name' => 'Endocrinology'],
            ['name' => 'Pulmonology'],
            ['name' => 'Obstetrics and Gynecology'],
            ['name' => 'Nephrology'],
            ['name' => 'Urology'],
            ['name' => 'Psychiatry'],
            ['name' => 'Radiology'],
            ['name' => 'Emergency Medicine'],
            ['name' => 'Hematology'],
            ['name' => 'Rheumatology'],
            ['name' => 'Ophthalmology'],
            ['name' => 'Otolaryngology'],
            ['name' => 'Anesthesiology'],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
