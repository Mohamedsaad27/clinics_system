<?php

namespace App\Repositories;
use App\Models\Clinic;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Interfaces\ClinicRepositoryInterface;
use App\Http\Requests\Clinic\StoreClinicRequest;
use App\Http\Requests\Clinic\UpdateClinicRequest;

class ClinicRepository implements ClinicRepositoryInterface
{
    public function index()
    {
        $clinics = Clinic::with('category')->get();
        return view('admin.clinics.index', compact('clinics'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.clinics.create', compact('categories'));
    }
    public function store(StoreClinicRequest $request)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = 'assets/imgs/clinics/' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/imgs/clinics'), $imageName);
                $data['image'] = $imageName;
            } else {
                $data['image'] = null;
            }
            $clinic = Clinic::create($data);
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
}
