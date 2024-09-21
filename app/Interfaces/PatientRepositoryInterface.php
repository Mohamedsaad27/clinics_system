<?php

namespace App\Interfaces;
use App\Http\Requests\Patient\StorePatientRequest;
use App\Http\Requests\Patient\UpdatePatientRequest;
use App\Models\User;

interface PatientRepositoryInterface
{
    public function index();
    public function create();
    public function store(StorePatientRequest $storePatientRequest);
    public function show(User $patient);
    public function edit(User $patient);
    public function update(UpdatePatientRequest $updatePatientRequest, User $patient);
    public function destroy(User $patient);
}