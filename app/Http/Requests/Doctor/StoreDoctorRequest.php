<?php

namespace App\Http\Requests\Doctor;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // or check for 'add-doctor' permission
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
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',                // At least one lowercase letter
                'regex:/[A-Z]/',                // At least one uppercase letter
                'regex:/[0-9]/',                // At least one number
                'regex:/[@$!%*?&()_\-+=\[\]{};:\'",.<>\/\\|`~]/',  // At least one special character
            ],
            'phone' => 'nullable|string|max:20|regex:/^\+?[0-9\s\-\(\)]*$/',
            'national_id' => 'nullable|string|max:20',
            'gender' => 'nullable|in:male,female',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'qualification' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'specialty_id' => 'required|exists:specialties,id',
            'city' => 'required|string|max:100',
            'country' => 'nullable|string|max:100',
            'clinic_id' => 'required|exists:clinics,id',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Name is required.',
            'name.string' => 'Name must be a valid string.',
            'name.max' => 'Name must not exceed 255 characters.',

            'email.required' => 'Email is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email address is already taken.',

            'password.required' => 'Password is required.',
            'password.string' => 'Password must be a string.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.regex' => 'Password must contain at least one lowercase letter, one uppercase letter, one number, and one special character.',

            'phone.string' => 'Phone must be a valid string.',
            'phone.max' => 'Phone number must not exceed 20 characters.',
            'phone.regex' => 'Phone number format is invalid.',

            'national_id.string' => 'National ID must be a valid string.',
            'national_id.max' => 'National ID must not exceed 20 characters.',

            'address.required' => 'Address is required.',
            'address.string' => 'Address must be a valid string.',
            'address.max' => 'Address must not exceed 255 characters.',

            'gender.in' => 'Gender must be either male or female.',

            'image.image' => 'The file must be a valid image.',
            'image.mimes' => 'Image must be of type: jpeg, png, jpg, or gif.',
            'image.max' => 'Image size must not exceed 2MB (2048 KB).',

            'experience_years.required' => 'Experience years are required.',
            'experience_years.integer' => 'Experience years must be a valid number.',
            'experience_years.min' => 'Experience years must be at least 1 year.',

            'qualification.required' => 'Qualification is required.',
            'qualification.string' => 'Qualification must be a valid string.',
            'qualification.max' => 'Qualification must not exceed 255 characters.',

            'department_id.required' => 'Department is required.',
            'department_id.exists' => 'Selected department is invalid.',

            'specialty_id.required' => 'Specialty is required.',
            'specialty_id.exists' => 'Selected specialty is invalid.',

            'city.required' => 'City is required.',
            'city.string' => 'City must be a valid string.',
            'city.max' => 'City must not exceed 100 characters.',

            'country.string' => 'Country must be a valid string.',
            'country.max' => 'Country must not exceed 100 characters.',

            'clinic_id.required' => 'Clinic is required.',
            'clinic_id.exists' => 'Selected clinic is invalid.',
        ];
    }
}
