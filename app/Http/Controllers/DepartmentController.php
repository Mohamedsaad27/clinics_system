<?php

namespace App\Http\Controllers;

use App\Http\Requests\Department\DepartmentRequest;
use App\Interfaces\DepartmentRepositoryInterface;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public $departmentRepository;

    public function __construct(DepartmentRepositoryInterface $departmentRepositoryInterface)
    {
        $this->departmentRepository = $departmentRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->departmentRepository->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->departmentRepository->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $departmentRequest)
    {
        return $this->departmentRepository->store($departmentRequest);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return $this->departmentRepository->edit($department);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $departmentRequest, Department $department)
    {
        return $this->departmentRepository->update($departmentRequest, $department);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        return $this->departmentRepository->destroy($department);
    }
}
