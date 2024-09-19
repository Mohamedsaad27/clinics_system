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
use Storage;

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
        // TODO: Implement show() method.
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

    public function update(UpdateDoctorRequest $updateDoctorRequest, string $id)
    {
        // TODO: Implement update() method.
    }
    public function destroy(Doctor $doctor)
    {
        // Begin a transaction to ensure data consistency
        \DB::beginTransaction();

        try {
            // Delete the row in the doctor table
            $doctor->delete();

            if ($doctor->user) {
                // Delete the user image if it exists
                if ($doctor->user->image) {
                    if (Storage::exists($doctor->user->image)) {
                        Storage::delete($doctor->user->image);
                    }
                }

                // Delete the related user addresses
                if ($doctor->user->userAddresses) {
                    foreach ($doctor->user->userAddresses as $address) {
                        $address->delete();
                    }
                }

                // Delete the user record
                $doctor->user->delete();
            }

            // Commit the transaction
            \DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
