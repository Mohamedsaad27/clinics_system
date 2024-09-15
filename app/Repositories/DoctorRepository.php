<?php

namespace App\Repositories;

use App\Models\Specialty;
use App\Models\Department;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Interfaces\DoctorRepositoryInterface;

class DoctorRepository implements DoctorRepositoryInterface
{
    public function index()
    {
        // TODO: Implement index() method.
    }
    public function create()
    {
        return [
            'departments' => Department::all(),
            'specialties' => Specialty::all(),
        ];
    }
    public function store(StoreDoctorRequest $storeDoctorRequest)
    {
       
    }
    public function show(string $id)
    {
        // TODO: Implement show() method.
    }
    public function edit(string $id)
    {
        // TODO: Implement edit() method.
    }
    public function update(UpdateDoctorRequest $updateDoctorRequest,string $id)
    {
        // TODO: Implement update() method.
    }
    public function destroy(string $id)
    {
        // TODO: Implement destroy() method.
    }
}
