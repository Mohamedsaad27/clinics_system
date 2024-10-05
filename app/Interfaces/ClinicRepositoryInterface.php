<?php

namespace App\Interfaces;

use App\Http\Requests\Clinic\StoreClinicRequest;
use App\Http\Requests\Clinic\UpdateClinicRequest;
use App\Models\Clinic;

interface ClinicRepositoryInterface
{
    public function index();
    public function create();
    public function store(StoreClinicRequest $request);
    public function show(Clinic $clinic);
    public function edit(Clinic $clinic);
    public function update(UpdateClinicRequest $request, Clinic $clinic);
    public function destroy(Clinic $clinic);
    public function getClinics($department_id);
}
