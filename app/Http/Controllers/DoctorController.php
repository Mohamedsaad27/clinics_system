<?php

namespace App\Http\Controllers;

use App\Interfaces\DoctorRepositoryInterface;
use App\Models\Doctor;
use App\Repositories\DoctorRepository;
use Illuminate\Http\Request;
use App\Services\DoctorService;
use App\Http\Requests\Doctor\StoreDoctorRequest;

class DoctorController extends Controller
{
    protected $doctorRepository;
    public function __construct(DoctorRepositoryInterface $doctorRepository)
    {
        $this->$doctorRepository = $doctorRepository;
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
        $data = $this->doctorService->create();
        return view('admin.doctors.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $this->doctorService->store($request);
        return redirect()->route('admin.doctors.index')->with('success', 'Doctor created successfully');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
