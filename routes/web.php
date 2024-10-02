<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AppointmentController;


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

        //--------------------------------/* Resource Routes Doctor */--------------------------------
    
        Route::resource('/doctors', DoctorController::class);
        Route::resource('/employees', EmployeeController::class);
        Route::resource('/patients', PatientController::class);
        Route::resource('/clinics', ClinicController::class);
        Route::resource('/appointments', AppointmentController::class);
        Route::resource('/departments', DepartmentController::class);
        Route::resource('/shifts', ShiftController::class);
        Route::get('/get-clinics/{department_id}', [AppointmentController::class, 'getClinics']);
        Route::get('/get-doctors/{clinic_id}', [AppointmentController::class, 'getDoctors']);
        Route::get('/get-shift/{doctor_id}', [AppointmentController::class, 'getShift']);
        Route::resource('/appoinments', AppointmentController::class);

    }
);

Route::prefix('admin')->as('admin.')->group(function () {
    Route::prefix('employees')->as('employees.')->group(function () {
        Route::resource('/employees', EmployeeController::class);
    });
});

Route::post('/doctors', [DoctorController::class, 'store'])->name('doctors.store');
Route::get('patient/{id}/patient-history', [PatientController::class, 'getPatientHistory'])->name('patient.patientHistory');



