<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;


Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

require __DIR__ . '/auth.php';


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
| These routes are reserved for the admin panel. Admins have full access
| to manage users, roles, permissions, and other sensitive settings.
|--------------------------------------------------------------------------
*/
Route::group(
    [
        'middleware',
        'prefix' => 'admin',
    ],
    function () {

        //--------------------------------/* Resourse Routes Doctor */--------------------------------
        Route::resource('/doctors', DoctorController::class);

    }
);

// Route::get('admin/doctors/create', [DoctorController::class, 'create'])->name('admin.doctors.create');
// Route::post('admin/doctors/store', [DoctorController::class, 'store'])->name('admin.doctors.store');
// Route::get('admin/doctors/index', [DoctorController::class, 'index'])->name('admin.doctors.index');
// Route::get('admin/doctors/show/{id}', [DoctorController::class, 'show'])->name('admin.doctors.show');
// Route::get('admin/doctors/edit/{id}', [DoctorController::class, 'edit'])->name('admin.doctors.edit');
// Route::put('admin/doctors/update/{id}', [DoctorController::class, 'update'])->name('admin.doctors.update');
// Route::delete('admin/doctors/destroy/{id}', [DoctorController::class, 'destroy'])->name('admin.doctors.destroy');

Route::get('admin/employees/create', [EmployeeController::class, 'create'])->name('admin.employees.create');
Route::post('admin/employees/store', [EmployeeController::class, 'store'])->name('admin.employees.store');
Route::get('admin/employees/index', [EmployeeController::class, 'index'])->name('admin.employees.index');
Route::get('admin/employees/edit/{id}', [EmployeeController::class, 'edit'])->name('admin.employees.edit');
Route::put('admin/employees/update/{id}', [EmployeeController::class, 'update'])->name('admin.employees.update');
Route::delete('admin/employees/destroy/{id}', [EmployeeController::class, 'destroy'])->name('admin.employees.destroy');

Route::post('/doctors', [DoctorController::class, 'store'])->name('doctors.store');



