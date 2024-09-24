<?php

namespace App\Http\Requests\Appointment;

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
            'patient_id' => 'required|exists:users,id',
            'department_id' => 'required|exists:departments,id',
            'clinic_id' => 'required|exists:clinics,id',
            'doctor_id' => 'required|exists:doctors,id',
            'shift_id' => 'required|exists:shifts,id',
            'appointment_date' => [
                'required',
                'unique:appointments,appointment_date',
                'date_format:H:i',
                function ($attribute, $value, $fail) {
                    $shift = Shift::find($this->shift_id);

                    $appointmentDateTime = \Carbon\Carbon::parse($value);
                    $startTime = \Carbon\Carbon::parse($shift->start_time);
                    $endTime = \Carbon\Carbon::parse($shift->end_time);

                    if ($appointmentDateTime < $startTime || $appointmentDateTime > $endTime) {
                        return $fail('The appointment date must be within the shift time from ' . $shift->start_time . ' to ' . $shift->end_time);
                    }
                }
            ],
            'status' => 'required|in:confirmed,pending,cancelled',
        ];
    }
}
