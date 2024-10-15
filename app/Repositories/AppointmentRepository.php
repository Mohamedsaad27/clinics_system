<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Shift;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\Department;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\AppointmentRepositoryInterface;
use App\Http\Requests\Appointment\StoreAppointmentRequest;
use App\Http\Requests\Appointment\UpdateAppointmentRequest;

class AppointmentRepository implements AppointmentRepositoryInterface
{
    /**
     * Get a list of all appointments.
     *
     * @return \Illuminate\Database\Eloquent\Collection|Appointment[]
     */
    public function index()
    {
        $appointments = Appointment::with(['patient', 'doctor', 'shift', 'clinic'])->get();
        return view('admin.appointment.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new appointment.
     *
     * @return mixed
     */
    public function create()
    {
        $patients = User::where('type', 'patient')->get();
        $departments = Department::all();

        return view('admin.appointment.create', compact('patients', 'departments'));
    }

    /**
     * Store a newly created appointment in storage.
     *
     * @param StoreAppointmentRequest $storeAppointmentRequest
     * @return Appointment
     */
    public function store(Request $request)
    {
        $data = $request->all();
        try {
            $patient = User::where('name', $data['patient_name'])->where('type', 'patient')->first();
            if(!$patient){
                $patient = User::create([
                    'name' => $data['patient_name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'password' => Hash::make($data['phone']),
                    'type' => 'patient',
                    'gender' => $data['gender'],
                ]);
            }
            $data['patient_id'] = $patient->id;
            Appointment::create($data);
            return redirect()->route('appointments.index')->with('successCreate', 'Appointment created successfully.');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('appointments.index')->with('errorCreate', 'Appointment creation failed.');
        }
    }

    /**
     * Display the specified appointment.
     *
     * @param Appointment $appointment
     * @return Appointment
     */
    public function show(Appointment $appointment)
    {
        return view('admin.appointment.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified appointment.
     *
     * @param Appointment $appointment
     * @return mixed
     */
    public function edit(Appointment $appointment)
    {
        return view('appointments.edit', compact('appointment'));
    }

    /**
     * Update the specified appointment in storage.
     *
     * @param UpdateAppointmentRequest $updateAppointmentRequest
     * @param Appointment $appointment
     * @return Appointment
     */
    public function update(UpdateAppointmentRequest $updateAppointmentRequest, Appointment $appointment)
    {
        $appointmentData = $updateAppointmentRequest->validated();
        $appointment->update($appointmentData); // Update the appointment
        return $appointment; // Return the updated appointment
    }

    /**
     * Remove the specified appointment from storage.
     *
     * @param Appointment $appointment
     * @return bool|null
     */
    public function destroy(Appointment $appointment)
    {
         try {
             $appointment->delete();
             return redirect()->route('appointments.index')->with('successDelete', 'Appointment deleted successfully.');
         } catch (\Exception $e) {
             dd($e->getMessage());
             return redirect()->route('appointments.index')->with('errorDelete', 'Appointment deletion failed.');
         }
    }


    public function getClinics($departmentId)
    {
        $clinics = Clinic::where('department_id', $departmentId)->get();

        if ($clinics->isEmpty()) {
            return response()->json([], 200);
        }

        return response()->json($clinics, 200);
    }

    public function getDoctors($clinicId)
    {
        $clinic = Clinic::findOrFail($clinicId);
        if (!$clinic) {
            return response()->json(['message' => 'Clinic not found'], 404);
        }
        $doctors = $clinic->doctors()->with('user')->get();

        if ($doctors->isEmpty()) {
            return response()->json([], 200);
        }

        return response()->json($doctors, 200);
    }

    public function getShift($doctorId)
    {
        $shift = Shift::where('doctor_id', $doctorId)->get();

        if ($shift->isEmpty()) {
            return response()->json(['message' => 'No shifts found'], 200);
        }

        $formattedShifts = $shift->map(function ($shift) {
            return [
                'id' => $shift->id,
                'shift_day_during_month' => $shift->shift_day_during_month,
                'shift_month' => $shift->shift_month,
                'price_appoinment' => $shift->price_appoinment,
                'start_time' => Carbon::parse($shift->start_time)->format('g:i A'),
                'end_time' => Carbon::parse($shift->end_time)->format('g:i A'),
            ];
        });

        return response()->json($formattedShifts, 200);
    }


}
