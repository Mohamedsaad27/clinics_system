<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'national_id' => 'required|string|max:20|unique:users',
            'gender' => 'required|in:male,female,other',
            'department_id' => 'required|exists:departments,id',
            'role' => 'required|in:nurse,receptionist',
            'hire_date' => 'required|date',
            'salary' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'required|string|min:8|confirmed',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ];
    }
}
