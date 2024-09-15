<?php

namespace App\Providers;

use App\Repositories\DoctorRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\DoctorRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        app()->bind(DoctorRepositoryInterface::class, DoctorRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
