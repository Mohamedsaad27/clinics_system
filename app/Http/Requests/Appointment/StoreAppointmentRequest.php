<?php

namespace App\Http\Requests\Appointment;

use Carbon\Carbon;
use App\Models\Shift;
use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'patient_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'gender' => 'required|in:male,female',
            'department_id' => 'required|exists:departments,id',
            'clinic_id' => 'required|exists:clinics,id',
            'doctor_id' => 'required|exists:doctors,id',
            'shift_id' => 'required|exists:shifts,id',
            'appointment_date' => [
                'required',
                'date_format:H:i',
                function ($attribute, $value, $fail) {
                    $shift = Shift::find($this->shift_id);
                    if (!$shift) {
                        return $fail('Invalid shift selected.');
                    }

                    $appointmentTime = Carbon::createFromFormat('H:i', $value);
                    $startTime = Carbon::parse($shift->start_time);
                    $endTime = Carbon::parse($shift->end_time);

                    if ($appointmentTime->lt($startTime) || $appointmentTime->gt($endTime)) {
                        return $fail("The appointment time must be between {$startTime->format('h:i')} and {$endTime->format('h:i')}.");
                    }
                },
            ],
            'status' => 'required|in:confirmed,pending,cancelled',
            'medical_device' => 'nullable|exists:medical_devices,id',
        ];
    }
}
