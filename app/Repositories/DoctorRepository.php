<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Specialty;
use App\Models\Department;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\DoctorRepositoryInterface;
use App\Http\Requests\Doctor\StoreDoctorRequest;
use App\Http\Requests\Doctor\UpdateDoctorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DoctorRepository implements DoctorRepositoryInterface
{
    public function index()
    {
        $doctors = Doctor::with('user.userAddresses', 'department', 'specialty')->get();
        return view('admin.doctor.index', compact('doctors'));
    }
    public function create()
    {
        $departments = Department::all();
        $specialties = Specialty::all();

        return view('admin.doctor.create', compact('departments', 'specialties'));
    }

    public function store(StoreDoctorRequest $storeDoctorRequest)
    {
        $data = $storeDoctorRequest->validated();
        try {
            DB::beginTransaction();
            if ($storeDoctorRequest->hasFile('image')) {
                $image = $storeDoctorRequest->file('image');
                $imageName = 'assets/imgs/doctors/' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/imgs/doctors'), $imageName);
                $data['image'] = $imageName;
            } else {
                $data['image'] = null;
            }

            // Create User Doctor
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'national_id' => $data['national_id'],
                'gender' => $data['gender'],
                'password' => $data['password'],
                'type' => 'doctor',
                'image' => $data['image'],
            ]);

            // Create Address User
            UserAddress::create([
                'user_id' => $user->id,
                'city' => $data['city'],
                'country' => $data['country']
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

            return redirect()->route('doctors.index')->with(['successCreate' => 'Doctor Created Successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e; // Handle errors
        }
    }

    public function show(string $id)
    {
        $doctor = Doctor::with('user.userAddresses', 'department', 'specialty')->find($id);
        return view('admin.doctor.show', compact('doctor'));
    }
    public function edit(Doctor $doctor)
    {
        // Load related data
        $doctor->load('user.userAddresses', 'department', 'specialty');

        // Retrieve all departments and specialties
        $departments = Department::all();
        $specialties = Specialty::all();

        // Return an array with the doctor and additional data
        return [
            'doctor' => $doctor,
            'departments' => $departments,
            'specialties' => $specialties,
        ];
    }
    public function update(UpdateDoctorRequest $updateDoctorRequest, Doctor $doctor)
    {
        $data = $updateDoctorRequest->validated();

        try {
            DB::beginTransaction();

            $user = $doctor->user;
            $user->update([
                'name' => $data['name'],
                'phone' => $data['phone'],
                'national_id' => $data['national_id'],
                'gender' => $data['gender'],
            ]);

            if (isset($data['password'])) {
                $user->update(['password' => Hash::make($data['password'])]);
            }

            if ($updateDoctorRequest->hasFile('image')) {
                if ($user->image && Storage::exists($user->image)) {
                    Storage::delete($user->image);
                }
                $image = $updateDoctorRequest->file('image');
                $imageName = 'assets/imgs/doctors/' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/imgs/doctors'), $imageName);
                $user->update(['image' => $imageName]);
            }
            $user->userAddresses()->update([
                'city' => $data['city'],
                'country' => $data['country']
            ]);
            $doctor->update([
                'experience_years' => $data['experience_years'],
                'qualification' => $data['qualification'],
                'department_id' => $data['department_id'],
                'specialty_id' => $data['specialty_id'],
            ]);
            DB::commit();

            return ['successUpdate' => 'Doctor Updated Successfully'];
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
    public function destroy(Doctor $doctor)
    {
        DB::beginTransaction();
        try {
            $doctor->delete();
            if ($doctor->user) {
                if ($doctor->user->image) {
                    if (Storage::exists($doctor->user->image)) {
                        Storage::delete($doctor->user->image);
                    }
                }
                if ($doctor->user->userAddresses) {
                    foreach ($doctor->user->userAddresses as $address) {
                        $address->delete();
                    }
                }
                $doctor->user->delete();
            }
            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
