<?php

namespace App\Interfaces;

use App\Http\Requests\Device\StoreMedicalDeviceRequest;
use App\Http\Requests\Device\UpdateMedicalDeviceRequest;
use App\Models\MedicalDevice;

interface MedicalDeviceRepositoryInterface
{
    public function index();
    public function create();
    public function store(StoreMedicalDeviceRequest $storeMedicalDeviceRequest);
    public function show($id);
    public function edit($id);
    public function update(UpdateMedicalDeviceRequest $updateMedicalDeviceRequest, $id);
    public function destroy($id);
    public function getMedicalDeviceByClinic($clinic_id);
}
