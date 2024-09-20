<?php

namespace App\Interfaces;

use App\Http\Requests\Doctor\StoreDoctorRequest;
use App\Http\Requests\Doctor\UpdateDoctorRequest;
use App\Models\Doctor;
use Illuminate\Http\Request;

interface DoctorRepositoryInterface
{
    public function index();
    public function create();
    public function store(StoreDoctorRequest $storeDoctorRequest);
    public function show(string $id);
    public function edit(Doctor $doctor);
    public function update(UpdateDoctorRequest $updateDoctorRequest,Doctor $doctor);
    public function destroy(Doctor $doctor);
}
