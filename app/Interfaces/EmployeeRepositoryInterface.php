<?php

namespace App\Interfaces;

use App\Models\Employee;
use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;

interface EmployeeRepositoryInterface
{
    public function index();
    public function create();
    public function store(StoreEmployeeRequest $storeEmployeeRequest);
    public function show(string $id);
    public function edit(Employee $employee);
    public function update(UpdateEmployeeRequest $updateEmployeeRequest,Employee $employee);
    public function destroy(Employee $employee);

}
