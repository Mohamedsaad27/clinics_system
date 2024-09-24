<?php

namespace App\Repositories;

use App\Http\Requests\Appointment\StoreAppointmentRequest;
use App\Http\Requests\Appointment\UpdateAppointmentRequest;
use App\Interfaces\AppointmentRepositoryInterface;
use App\Models\Appointment;
use App\Models\Clinic;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Shift;
use App\Models\User;
use Illuminate\Support\Carbon;

class AppointmentRepository implements AppointmentRepositoryInterface
{
    /**
     * Get a list of all appointments.
     *
     * @return \Illuminate\Database\Eloquent\Collection|Appointment[]
     */
    public function index()
    {
        return Appointment::all(); // Fetch all appointments
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
    public function store(StoreAppointmentRequest $storeAppointmentRequest)
    {
        $data = $storeAppointmentRequest->validated();

        // $shift = Shift::find($data['shift_id']);
        // $appointmentsCount = Appointment::where('shift_id', $data['shift_id'])
        //     ->whereDay('created_at', Carbon::now())
        //     ->count();
        // dd($appointmentsCount);

        // if ($appointmentsCount > $shift->max_patients) {
        //     return redirect()->route('appointments.create')->with('errorCreate', 'Shift has reached the maximum number of patients.');
        // }

        try {

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
        return $appointment;
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
        return $appointment->delete(); // Delete the appointment
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
            return response()->json([], 200);
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
