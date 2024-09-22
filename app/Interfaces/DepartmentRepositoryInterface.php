<?php

namespace App\Interfaces;
use App\Http\Requests\Department\DepartmentRequest;
use App\Models\Department;

interface DepartmentRepositoryInterface
{
    public function index();
    public function create();
    public function store(DepartmentRequest $departmentRequest);
    public function edit(Department $department);
    public function update(DepartmentRequest $departmentRequest, Department $department);
    public function destroy(Department $department);

}