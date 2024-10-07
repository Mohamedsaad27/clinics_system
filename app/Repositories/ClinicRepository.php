<?php

namespace App\Repositories;
use App\Models\Clinic;
use App\Models\Category;
use App\Models\Department;
use App\Models\ClinicDevice;
use App\Models\MedicalDevice;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Interfaces\ClinicRepositoryInterface;
use App\Http\Requests\Clinic\StoreClinicRequest;
use App\Http\Requests\Clinic\UpdateClinicRequest;

class ClinicRepository implements ClinicRepositoryInterface
{
    public function index()
    {
        $clinics = Clinic::with('category','devices','department')->get();
        return view('admin.clinics.index', compact('clinics'));
    }
    public function create()
    {
        $categories = Category::all();
        $departments = Department::all();
        $medical_devices = MedicalDevice::all();
        return view('admin.clinics.create', compact('categories', 'departments', 'medical_devices'));
    }
    public function store(StoreClinicRequest $request)
    {
        $validatedData = $request->validated();
        try {
            DB::beginTransaction();
            $clinic = Clinic::create($validatedData);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = 'assets/imgs/clinics/' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/imgs/clinics'), $imageName);
                $clinic->update(['image' => $imageName]);
            }
            foreach ($validatedData['medical_devices'] as $deviceId) {
                ClinicDevice::create([
                    'clinic_id' => $clinic->id,
                    'device_id' => $deviceId,
                ]);
            }
            DB::commit();
            return redirect()->route('clinics.index')->with('successCreate', 'Clinic created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('clinics.index')->with('errorCreate', 'Clinic creation failed');
        }
    }
    public function show(Clinic $clinic)
    {
        $clinic->load('doctors', 'appointments');
        return view('admin.clinics.show', compact('clinic'));
    }
    public function edit(Clinic $clinic)
    {
        $categories = Category::all();
        return view('admin.clinics.edit', compact('clinic', 'categories'));
    }
    public function update(UpdateClinicRequest $request, Clinic $clinic)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = 'assets/imgs/clinics/' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/imgs/clinics'), $imageName);
                if ($clinic->image) {
                    unlink(public_path($clinic->image));
                }
                $data['image'] = $imageName;
            } else {
                $data['image'] = null;
            }
            $clinic->update($data);
            DB::commit();
            return redirect()->route('clinics.index')->with('successUpdate', 'Clinic updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('clinics.index')->with('errorUpdate', 'Clinic update failed');
        }
    }
    public function destroy(Clinic $clinic)
    {
        try {
            DB::beginTransaction();
            if ($clinic->image) {
                unlink(public_path($clinic->image));
            }
            $clinic->delete();
            DB::commit();
            return redirect()->route('clinics.index')->with('successDelete', 'Clinic deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('clinics.index')->with('errorDelete', 'Clinic deletion failed');
        }
    }
    public function getClinics($department_id)
    {
        $clinics = Clinic::where('department_id', $department_id)->get();
        return response()->json($clinics);
    }
}
