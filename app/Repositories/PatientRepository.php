<?php

namespace App\Repositories;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Interfaces\PatientRepositoryInterface;
use App\Http\Requests\Patient\StorePatientRequest;
use App\Http\Requests\Patient\UpdatePatientRequest;


class PatientRepository implements PatientRepositoryInterface
{
    public function index()
    {
        $patients = User::where('type', 'patient')->with('userAddresses')->paginate(5);
        return $patients;
    }

    public function create()
    {
        return view('admin.patient.create');
    }

    public function store(StorePatientRequest $storePatientRequest)
    {
        $data = $storePatientRequest->validated();
        try {
            DB::beginTransaction();
            if ($storePatientRequest->hasFile('image')) {
                $image = $storePatientRequest->file('image');
                $imageName = 'assets/imgs/patients/' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/imgs/patients'), $imageName);
                $data['image'] = $imageName;
            } else {
                $data['image'] = null;
            }

            // Create User Patient
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'national_id' => $data['national_id'],
                'gender' => $data['gender'],
                'password' => $data['password'],
                'type' => 'patient',
                'image' => $data['image'],
            ]);

            // Create Address User Patient
            UserAddress::create([
                'user_id' => $user->id,
                'city' => $data['city'],
                'country' => $data['country']
            ]);

            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
    public function edit(User $patient)
    {
    }
    public function show(User $patient)
    {
    }
    public function update(UpdatePatientRequest $updatePatientRequest, User $patient)
    {
        $data = $updatePatientRequest->validated();

        try {
            DB::beginTransaction();

            $patientData = Arr::except($data, ['city', 'country', 'image', 'password']);
            $patientAddressData = Arr::only($data, ['city', 'country']);

            // Update patient data
            $patient->update($patientData);

            // Handle password update
            if (!empty($data['password'])) {
                $patient->update(['password' => Hash::make($data['password'])]);
            }

            // Handle image upload
            if ($updatePatientRequest->hasFile('image')) {
                // Delete old image if exists
                if ($patient->image && Storage::exists($patient->image)) {
                    Storage::delete($patient->image);
                }
                // Store new image
                $image = $updatePatientRequest->file('image');
                $imageName = 'assets/imgs/patients/' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/imgs/patients'), $imageName);
                $patient->update(['image' => $imageName]);
            }

            // Update user addresses
            $patient->userAddresses()->update($patientAddressData);

            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function destroy(User $patient)
    {
        DB::beginTransaction();
        try {
            $patient->delete();
            if ($patient->userAddresses) {
                foreach ($patient->userAddresses as $address) {
                    $address->delete();
                }
            }
            
            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}