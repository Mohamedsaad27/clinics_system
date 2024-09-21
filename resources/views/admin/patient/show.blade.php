<x-admin-layout>
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Patient Details</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted"
                                    href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a class="text-muted"
                                    href="{{ route('patients.index') }}">Patients</a></li>
                            <li class="breadcrumb-item" aria-current="page">Patient Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 mb-4 text-center">
                    <img src="{{ asset($patient->image_url) }}" alt="Patient Image" class="rounded-circle"
                        style="width: 200px; height: 200px; object-fit: cover;">
                </div>
                <div class="col-md-8">
                    <h3 class="card-title">{{ $patient->name }}</h3>
                    <p class="card-text"><strong>Email:</strong> {{ $patient->email }}</p>
                    <p class="card-text"><strong>Phone:</strong> {{ $patient->phone }}</p>
                    <p class="card-text"><strong>National ID:</strong> {{ $patient->national_id }}</p>
                    <p class="card-text"><strong>Gender:</strong> {{ ucfirst($patient->gender) }}</p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <h4>Address Information</h4>
                    @if ($patient->userAddresses->isNotEmpty())
                        @foreach ($patient->userAddresses as $address)
                            <p><strong>Address:</strong> {{ $address->city }}, {{ $address->country }}</p>
                        @endforeach
                    @else
                        <p>No address information available.</p>
                    @endif
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-primary">Edit Patient</a>
                <a href="{{ route('patients.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</x-admin-layout>
