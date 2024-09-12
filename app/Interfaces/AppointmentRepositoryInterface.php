<?php

namespace App\Interfaces;

use App\Http\Requests\AppointmentRequest\StoreAppointmentRequest;
use App\Http\Requests\AppointmentRequest\UpdateAppointmentRequest;

interface AppointmentRepositoryInterface
{
    public function getAllAppointments();
    public function getAppointmentById($id);
    public function createAppointment(StoreAppointmentRequest $request);
    public function updateAppointment(UpdateAppointmentRequest $request,$id);
    public function deleteAppointment($id);
}
