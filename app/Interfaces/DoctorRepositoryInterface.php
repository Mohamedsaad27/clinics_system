<?php

namespace App\Interfaces;

use App\Http\Requests\Doctor\StoreDoctorRequest;
use App\Http\Requests\Doctor\UpdateDoctorRequest;
use Illuminate\Http\Request;

interface DoctorRepositoryInterface
{
    public function index();
    public function store(StoreDoctorRequest $storeDoctorRequest);
    public function show(string $id);
    public function edit(string $id);
    public function update(UpdateDoctorRequest $updateDoctorRequest,string $id);
    public function destroy(string $id);
}
