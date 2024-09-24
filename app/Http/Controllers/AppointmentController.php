<?php

namespace App\Http\Controllers;

use App\Http\Requests\Appointment\StoreAppointmentRequest;
use App\Interfaces\AppointmentRepositoryInterface;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public $appointmentRepository;

    public function __construct(AppointmentRepositoryInterface $appointmentRepositoryInterface)
    {
        $this->appointmentRepository = $appointmentRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->appointmentRepository->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentRequest $storeAppointmentRequest)
    {
        return $this->appointmentRepository->store($storeAppointmentRequest);
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }

    public function getClinics($departmentId)
    {
        return $this->appointmentRepository->getClinics($departmentId);
    }

    public function getDoctors($clinicId)
    {
        return $this->appointmentRepository->getDoctors($clinicId);
    }

    public function getShift($doctorId)
    {
        return $this->appointmentRepository->getShift($doctorId);
    }
}
