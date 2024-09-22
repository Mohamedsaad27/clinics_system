<?php

namespace App\Providers;

use App\Repositories\ClinicRepository;
use App\Repositories\DoctorRepository;
use App\Repositories\PatientRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\EmployeeRepository;
use App\Interfaces\ClinicRepositoryInterface;
use App\Interfaces\DoctorRepositoryInterface;
use App\Interfaces\PatientRepositoryInterface;
use App\Interfaces\EmployeeRepositoryInterface;

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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
