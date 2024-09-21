<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Services\DoctorService;
use App\Repositories\DoctorRepository;
use App\Interfaces\DoctorRepositoryInterface;
use App\Http\Requests\Doctor\StoreDoctorRequest;
use App\Http\Requests\Doctor\UpdateDoctorRequest;

class DoctorController extends Controller
{
    protected $doctorRepository;
    public function __construct(DoctorRepositoryInterface $doctorRepository)
    {
        $this->doctorRepository = $doctorRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->doctorRepository->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->doctorRepository->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorRequest $request)
    {
        return $this->doctorRepository->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        $data = $this->doctorRepository->edit($doctor);

        return view('admin.doctor.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        try {
            $result = $this->doctorRepository->update($request, $doctor);
            return redirect()->route('doctors.index')->with(['successUpdate' => 'Doctor Updated Successfully']);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with(['errorUpdate' => 'An error occurred while updating the doctor: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        try {
            $this->doctorRepository->destroy($doctor);

            return redirect()->route('doctors.index')->with('successDelete', 'Doctor and related data deleted successfully.');

        } catch (\Exception $e) {

            return redirect()->route('doctors.index')->with('errorDelete', "An error occurred while deleting the doctor :" . $e->getMessage());
        }
    }

}
