<?php

namespace App\Providers;

use App\Repositories\ShiftRepository;
use App\Repositories\ClinicRepository;
use App\Repositories\DoctorRepository;
use App\Repositories\PatientRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\EmployeeRepository;
use App\Repositories\DepartmentRepository;
use App\Repositories\AppointmentRepository;
use App\Interfaces\ShiftRepositoryInterface;
use App\Interfaces\ClinicRepositoryInterface;
use App\Interfaces\DoctorRepositoryInterface;
use App\Repositories\MedicalDeviceRepository;
use App\Interfaces\PatientRepositoryInterface;
use App\Interfaces\EmployeeRepositoryInterface;
use App\Interfaces\DepartmentRepositoryInterface;
use App\Interfaces\AppointmentRepositoryInterface;
use App\Interfaces\MedicalDeviceRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        app()->bind(DoctorRepositoryInterface::class, DoctorRepository::class);
        app()->bind(EmployeeRepositoryInterface::class, EmployeeRepository::class);
        app()->bind(PatientRepositoryInterface::class, PatientRepository::class);
        app()->bind(ClinicRepositoryInterface::class, ClinicRepository::class);
        app()->bind(ShiftRepositoryInterface::class, ShiftRepository::class);
        app()->bind(DepartmentRepositoryInterface::class, DepartmentRepository::class);
        app()->bind(AppointmentRepositoryInterface::class, AppointmentRepository::class);
        app()->bind(MedicalDeviceRepositoryInterface::class, MedicalDeviceRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
