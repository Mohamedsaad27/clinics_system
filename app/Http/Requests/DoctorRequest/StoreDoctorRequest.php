<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
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
            'email' => 'required|email|unique:doctors,email',
            'phone' => 'nullable|string|max:20',
            'national_id' => 'nullable|string|max:20',
            'experience_years' => 'required|integer|min:0',
            'qualification' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'gender' => 'nullable|in:male,female',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'department_id' => 'required|exists:departments,id',
            'specialty_id' => 'required|exists:specialties,id',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
            'name.max' => 'Name must be less than 255 characters',
            
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'email.unique' => 'Email must be unique',
            
            'phone.string' => 'Phone must be a string',
            'phone.max' => 'Phone must be less than 20 characters',
            
            'national_id.string' => 'National ID must be a string',
            'national_id.max' => 'National ID must be less than 20 characters',
            
            'address.required' => 'Address is required',
            'address.string' => 'Address must be a string',
            'address.max' => 'Address must be less than 255 characters',
            
            
            'gender.in' => 'Gender must be male or female',

            
            'image.image' => 'Image must be an image',
            'image.mimes' => 'Image must be a valid image',
            'image.max' => 'Image must be less than 2048 KB',
            
            'experience_years.min' => 'Experience years must be greater than 0',
            'experience_years.integer' => 'Experience years must be an integer',
            'experience_years.required' => 'Experience years is required',
            
            
            'qualification.string' => 'Qualification must be a string',
            'qualification.max' => 'Qualification must be less than 255 characters',
            'qualification.required' => 'Qualification is required',
           
            'department_id.required' => 'Department is required',
            'department_id.exists' => 'Department must be a valid department',
            
            'specialty_id.required' => 'Specialty is required',
            'specialty_id.exists' => 'Specialty must be a valid specialty',
        ];
    }
}
