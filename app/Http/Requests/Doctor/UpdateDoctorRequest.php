<?php

namespace App\Http\Requests\Doctor;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDoctorRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'national_id' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type' => 'required|string|max:255|in:doctor,nurse,reciepcent_employee,nurse_employee,patient',
            'password' => 'nullable|string|min:8',
            'department_id' => 'required|exists:departments,id',
            'specialty_id' => 'required|exists:specialties,id',
            'experience_years' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ];
    }
}
