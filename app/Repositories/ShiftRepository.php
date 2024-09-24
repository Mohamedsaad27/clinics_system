<?php

namespace App\Repositories;

use App\Models\Shift;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreShiftRequest;
use App\Http\Requests\UpdateShiftRequest;
use App\Interfaces\ShiftRepositoryInterface;

class ShiftRepository implements ShiftRepositoryInterface
{
    public function index()
    {
        $shifts = Shift::with('doctor', 'clinic', 'appointments')->get();
        return view('admin.shift.index', compact('shifts'));
    }
    public function show(Shift $shift)
    {
        $shift = Shift::with('doctor', 'clinic', 'appointments')->find($shift->id);
        return view('admin.shift.show', compact('shift'));
    }
    public function create()
    {
        $doctors = DB::table('doctors')
            ->join('users', 'doctors.doctor_id', '=', 'users.id')
            ->select('doctors.id', 'users.name')
            ->get();
        $days = collect(Carbon::getDays())->map(function ($day) {
            return strtolower($day);
        });
        $clinics = DB::table('clinics')->select('id', 'clinic_name')->get();
        return view('admin.shift.create', compact('doctors', 'clinics', 'days'));
    }
    public function store(StoreShiftRequest $request)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            $shift = Shift::create($data);
            DB::commit();
            return redirect()->route('shifts.index')->with('successCreate', 'Shift created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('shifts.index')->with('errorCreate', 'Shift creation failed');
        }
    }
    public function edit(Shift $shift)
    {
        $doctors = DB::table('doctors')
            ->join('users', 'doctors.doctor_id', '=', 'users.id')
            ->select('doctors.id', 'users.name')
            ->get();
        $clinics = DB::table('clinics')->select('id', 'clinic_name')->get();
        $days = collect(Carbon::getDays())->map(function ($day) {
            return strtolower($day);
        });
        return view('admin.shift.edit', compact('shift', 'doctors', 'clinics', 'days'));
    }
    public function update(UpdateShiftRequest $request, Shift $shift)
    {
        $data = $request->validated();
        try {
            $shift->update($data);
            return redirect()->route('shifts.index')->with('successUpdate', 'Shift updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('shifts.index')->with('errorUpdate', 'Shift update failed');
        }
    }
    public function destroy(Shift $shift)
    {
        try {
            $shift->delete();
            return redirect()->route('shifts.index')->with('successDelete', 'Shift deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('shifts.index')->with('errorDelete', 'Shift deletion failed');
        }
    }

    public function getDoctorShifts($doctorId)
    {
    }
    public function getClinicShifts($clinicId)
    {
    }
}
