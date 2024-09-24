<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            UserSeeder::class,
            SpecialtySeeder::class,
            DepartmentSeeder::class,
            CategorySeeder::class,
            UserAddressSeeder::class,
            ClinicSeeder::class,
            DoctorSeeder::class,
            ShiftSeeder::class,
            AppointmentSeeder::class,
        ]);
    }
}
