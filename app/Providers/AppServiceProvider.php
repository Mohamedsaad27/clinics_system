<?php

namespace App\Providers;

use App\Interfaces\PatientRepositoryInterface;
use App\Repositories\DoctorRepository;
use App\Repositories\PatientRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\EmployeeRepository;
use App\Interfaces\DoctorRepositoryInterface;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
