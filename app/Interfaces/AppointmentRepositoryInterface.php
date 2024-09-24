<?php

namespace App\Interfaces;

use App\Http\Requests\Appointment\StoreAppointmentRequest;
use App\Http\Requests\Appointment\UpdateAppointmentRequest;
use App\Models\Appointment;

interface AppointmentRepositoryInterface
{
    public function index();
    public function create();
    public function store(StoreAppointmentRequest $storeAppointmentRequest);
    public function show(Appointment $appointment);
    public function edit(Appointment $appointment);
    public function update(UpdateAppointmentRequest $updateAppointmentRequest, Appointment $appointment);
    public function destroy(Appointment $appointment);
    public function getClinics($departmentId);
}
