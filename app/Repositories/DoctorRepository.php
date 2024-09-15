<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Specialty;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\DoctorRepositoryInterface;
use App\Http\Requests\Doctor\StoreDoctorRequest;
use App\Http\Requests\Doctor\UpdateDoctorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorRepository implements DoctorRepositoryInterface
{
    public function index()
    {
        return Doctor::with('user', 'department', 'specialty')->get();
    }
    public function create()
    {
        return [
            'departments' => Department::all(),
            'specialties' => Specialty::all(),
        ];
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:20|unique:users,phone',
            'national_id' => 'nullable|string|max:20|unique:users,national_id',
            'experience_years' => 'required|integer|min:0',
            'qualification' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'gender' => 'nullable|in:male,female',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'department_id' => 'required|exists:departments,id',
            'specialty_id' => 'required|exists:specialties,id',
            'password' => 'required|string|min:8|confirmed', // Added password validation
        ]);
    
        DB::beginTransaction();
    
        try {
            // Handle image
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('doctors/images'), $imageName);
                $data['image'] = $imageName;
            } else {
                $data['image'] = 'default.png';
            }
    
            // Create User
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'national_id' => $data['national_id'],
                'gender' => $data['gender'],
                'password' => Hash::make($data['password']),
                'user_type_id' => 1,
                'image' => $data['image'],
            ]);
    
            // Create Doctor
            Doctor::create([
                'doctor_id' => $user->id,
                'experience_years' => $data['experience_years'],
                'qualification' => $data['qualification'],
                'department_id' => $data['department_id'],
                'specialty_id' => $data['specialty_id'],
            ]);
    
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e; // Handle errors
        }
    }
    
    public function show(string $id)
    {
        // TODO: Implement show() method.
    }
    public function edit(string $id)
    {
        // TODO: Implement edit() method.
    }
    public function update(UpdateDoctorRequest $updateDoctorRequest, string $id)
    {
        // TODO: Implement update() method.
    }
    public function destroy(string $id)
    {
        // TODO: Implement destroy() method.
    }
}
