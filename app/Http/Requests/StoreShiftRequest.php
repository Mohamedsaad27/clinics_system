<?php

namespace App\Http\Requests;

use App\Models\Shift;
use Illuminate\Foundation\Http\FormRequest;

class StoreShiftRequest extends FormRequest
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
        $nowMonth = \Carbon\Carbon::now()->format('d-m-y');
        return [
            'doctor_id' => 'required|exists:doctors,id',
            'clinic_id' => 'required|exists:clinics,id',
            'shift_month' => "required|date_format:Y-m|after:$nowMonth",
            'shift_day_during_month' => [
                'required',
                'in:saturday,sunday,monday,tuesday,wednesday,thursday,friday',
                function ($attribute, $value, $fail) {
                    $shift = Shift::where('doctor_id', $this->doctor_id)
                        ->where('shift_month', $this->shift_month)
                        ->where('shift_day_during_month', $value)
                        ->where(function ($query) {
                            $query->whereBetween('start_time', [$this->start_time, $this->end_time])
                                ->orWhereBetween('end_time', [$this->start_time, $this->end_time]);
                        })
                        ->first();

                    if ($shift) {
                        $fail("The doctor already has a shift on {$shift->shift_day_during_month} from {$shift->start_time} to {$shift->end_time}.");
                    }
                },
            ],
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'max_patients' => 'required|integer|min:1',
            'price_appoinment' => 'required|integer|min:1',
        ];
    }
}
