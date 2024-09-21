<?php

namespace App\Repositories;

use Exception;
use App\Models\User;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\EmployeeRepositoryInterface;
use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function index()
    {
        $employees = Employee::with('user.userAddresses', 'department')->paginate(5);
        return view('admin.employee.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('admin.employee.create', compact('departments'));
    }




    public function store(StoreEmployeeRequest $storeEmployeeRequest)
    {
        $data = $storeEmployeeRequest->validated();
       try{
        DB::beginTransaction();
        if ($storeEmployeeRequest->hasFile('image')) {
            $image = $storeEmployeeRequest->file('image');
            $imageName = 'assets/imgs/employees/' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/imgs/employees'), $imageName);
            $data['image'] = $imageName;
        } else {
            $data['image'] = null;
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'national_id' => $data['national_id'],
            'gender' => $data['gender'],
            'password' => Hash::make($data['password']),
            'type' =>  $data['role'] == 'nurse' ? 'nurse_employee' : 'reciepcent_employee',
            'image' => $data['image'],
        ]);

        $user->userAddresses()->create([
            'city' => $data['city'],
            'country' => $data['country']
        ]);
        $employee = Employee::create([
            'employee_id' => $user->id,

            'department_id' => $data['department_id'],
            'role' => $data['role'],
            'hire_date' => $data['hire_date'],
            'salary' => $data['salary'],
        ]);

        DB::commit();
        return redirect()->route('employees.index')->with('successCreate', 'Employee created successfully');
       }catch(Exception $e){
        DB::rollBack();
        return redirect()->back()->with('error', $e->getMessage());
       }
    }


    public function show(string $id)
    {
        try{
            $employee = Employee::with('user.userAddresses', 'department')->find($id);
            $user = User::with('userAddresses')->find($employee->employee_id);
            return view('admin.employee.show', compact('employee', 'user'));
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function edit(Employee $employee)
    {
       $departments = Department::all();
       $user = User::with('userAddresses')->find($employee->employee_id);
       return view('admin.employee.edit', compact('employee', 'departments'));
    }


    public function update(UpdateEmployeeRequest $updateEmployeeRequest, Employee $employee)
    {
       $data = $updateEmployeeRequest->validated();
       try{
           DB::beginTransaction();
        $user = User::with('userAddresses')->find($employee->employee_id);
        if ($updateEmployeeRequest->hasFile('image')) {
            $image = $updateEmployeeRequest->file('image');
            $imageName = 'assets/imgs/employees/' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/imgs/employees'), $imageName);
            if ($user->image && file_exists(public_path($user->image))) {
                unlink(public_path($user->image));
            }
            $data['image'] = $imageName;
        } else {
            $data['image'] = $user->image; 
        }
        $user = User::find($employee->employee_id);
        if($data['password']){
            $data['password'] = Hash::make($data['password']);
        }else{
            $data['password'] = $user->password;
        }
        $user->update([
            'name' => $data['name'],

            'phone' => $data['phone'],
            'national_id' => $data['national_id'],
            'gender' => $data['gender'],
            'image' => $data['image'],
        ]);
        $user->userAddresses()->update([
            'city' => $data['city'],
            'country' => $data['country']
        ]);
        $employee->update([
            'department_id' => $data['department_id'],

            'role' => $data['role'],
            'hire_date' => $data['hire_date'],
            'salary' => $data['salary'],
        ]);
        DB::commit();
        return redirect()->route('employees.index')->with('successUpdate', 'Employee updated successfully');
       }catch(Exception $e){
        DB::rollBack();
        return redirect()->back()->with('error', $e->getMessage());
       }
    }


    public function destroy(Employee $employee)
    {
        try{
            $user = User::find($employee->employee_id);
            DB::beginTransaction();
            $employee->delete();
            $user->delete();
            DB::commit();
            return redirect()->route('employees.index')->with('successDelete', 'Employee deleted successfully');
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('errorDelete', $e->getMessage());
        }
    }
}

