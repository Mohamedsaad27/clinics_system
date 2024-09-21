<x-admin-layout>
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Employee Details</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('employees.index') }}">Employees</a></li>
                            <li class="breadcrumb-item" aria-current="page">Employee Details</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ asset('assets/images/breadcrumb/ChatBc.png') }}" alt="" class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 mb-4 text-center">
                    <img src="{{ asset($user->image ?? 'assets/images/profile/user-1.jpg') }}" alt="Employee Image" class="rounded-circle" style="width: 200px; height: 200px; object-fit: cover;">
                </div>
                <div class="col-md-8">
                    <h3 class="card-title">{{ $user->name }}</h3>
                    <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                    <p class="card-text"><strong>Phone:</strong> {{ $user->phone }}</p>
                    <p class="card-text"><strong>National ID:</strong> {{ $user->national_id }}</p>
                    <p class="card-text"><strong>Gender:</strong> {{ ucfirst($user->gender) }}</p>
                    <p class="card-text"><strong>Department:</strong> {{ $employee->department->name }}</p>
                    <p class="card-text"><strong>Role:</strong> {{ ucfirst($employee->role) }}</p>
                    <p class="card-text"><strong>Hire Date:</strong> {{ $employee->hire_date }}</p>
                    <p class="card-text"><strong>Salary:</strong> ${{ number_format($employee->salary, 2) }}</p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <h4>Address Information</h4>
                    @if($user->userAddresses->isNotEmpty())
                        @foreach($user->userAddresses as $address)
                            <p><strong>Address:</strong> {{ $address->city }}, {{ $address->country }}</p>
                        @endforeach
                    @else
                        <p>No address information available.</p>
                    @endif
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">Edit Employee</a>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</x-admin-layout>
