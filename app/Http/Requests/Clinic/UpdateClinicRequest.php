<?php

namespace App\Http\Requests\Clinic;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClinicRequest extends FormRequest
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
            'clinic_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'contact_info' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'medical_devices' => 'nullable|array',
            'medical_devices.*' => 'exists:medical_devices,id',
        ];
    }
}
