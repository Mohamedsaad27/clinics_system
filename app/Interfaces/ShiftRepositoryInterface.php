<?php

namespace App\Interfaces;

use App\Http\Requests\Shift\StoreShiftRequest;
use App\Http\Requests\Shift\UpdateShiftRequest;
use App\Models\Shift;

interface ShiftRepositoryInterface
{
    public function index();
    public function show(Shift $shift);
    public function create();
    public function store(StoreShiftRequest $request);
    public function edit(Shift $shift);
    public function update(UpdateShiftRequest $request, Shift $shift);
    public function destroy(Shift $shift);
    public function getDoctorShifts($doctorId);
    public function getClinicShifts($clinicId);

}
