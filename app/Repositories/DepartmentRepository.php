<?php

namespace App\Repositories;
use App\Http\Requests\Department\DepartmentRequest;
use App\Interfaces\DepartmentRepositoryInterface;
use App\Models\Department;

class DepartmentRepository implements DepartmentRepositoryInterface
{
    public function index()
    {
        $departments = Department::paginate(5);
        return view('admin.department.index', compact('departments'));
    }
    public function create()
    {
        return view('admin.department.create');
    }
    public function store(DepartmentRequest $departmentRequest)
    {
        $data = $departmentRequest->validated();
        Department::create($data);

        return redirect()->route('departments.index')->with('successCreate', 'Department created successfully');
    }


    public function edit(Department $department)
    {
        return view('admin.department.edit', compact('department'));
    }

    public function update(DepartmentRequest $departmentRequest, Department $department)
    {
        $data = $departmentRequest->validated();
        $department->update($data);

        return redirect()->route('departments.index')->with('successUpdate', 'Department updated successfully');
    }

    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('departments.index')->with('successDelete', 'Department deleted successfully');
    }
}