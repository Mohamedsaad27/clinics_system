<?php

namespace App\Http\Controllers;

use App\Http\Requests\Patient\StorePatientRequest;
use App\Http\Requests\Patient\UpdatePatientRequest;
use App\Interfaces\PatientRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    public $patientRepository;

    public function __construct(PatientRepositoryInterface $patientRepositoryInterface)
    {
        $this->patientRepository = $patientRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = $this->patientRepository->index();
        return view('admin.patient.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.patient.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientRequest $request)
    {
        try {
            $this->patientRepository->store($request);

            return redirect()->route('patients.index')->with('successDelete', 'Patient Created successfully.');
        } catch (\Exception $e) {

            return redirect()->route('patients.index')->with('errorDelete', "An error occurred while deleting the Patient :" . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $patient)
    {
        return view('admin.patient.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $patient)
    {
        return view('admin.patient.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $updatePatientRequest, User $patient)
    {
        try {
            $this->patientRepository->update($updatePatientRequest, $patient);

            return redirect()->route('patients.index')->with(['successUpdate' => 'Patient Updated Successfully']);
        } catch (\Exception $e) {

            return redirect()->route('patients.index')->with(['errorUpdate' => 'An error occurred while updating the patient: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $patient)
    {
        try {
            $this->patientRepository->destroy($patient);

            return redirect()->route('patients.index')->with('successDelete', 'patient and related data deleted successfully.');
        } catch (\Exception $e) {

            return redirect()->route('patients.index')->with('errorDelete', "An error occurred while deleting the patient :" . $e->getMessage());
        }
    }
    public function getPatientHistory($id)
    {
        $patient = User::find($id);
        $appointments = $patient->appointments()->with(['patient', 'doctor.user', 'clinic.department'])->get();
        return response()->json($appointments);
    }

 
    public function getPatients($patient_name)
    {
        $patients = User::where('type', 'patient')
            ->where('name', 'like', '%' . $patient_name . '%')
            ->get(['id', 'name']);
        return response()->json($patients);
    }
}
