<x-admin-layout>
    @push('scripts')
        <script>
            // Add any necessary JavaScript here
        </script>
    @endpush

    {{-- Start Breadcrumb --}}
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Clinic Details</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('clinics.index') }}">Clinics</a></li>
                            <li class="breadcrumb-item" aria-current="page">{{ $clinic->clinic_name }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <a href="{{ route('clinics.edit', $clinic->id) }}" class="btn btn-primary">Edit Clinic</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Breadcrumb --}}

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-2 mb-4 mb-md-0">
                    <img src="{{ asset($clinic->image ?? 'assets/images/profile/user-1.jpg') }}" alt="{{ $clinic->clinic_name }}" class="img-fluid rounded">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-4">{{ $clinic->clinic_name }}</h2>
                    <p><strong>Category:</strong> {{ $clinic->category->name }}</p>
                    <p><strong>Location:</strong> {{ $clinic->location }}</p>
                    <p><strong>Contact Info:</strong> {{ $clinic->contact_info }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <h3 class="card-title">Doctors</h3>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Specialization</th>
                            <th>Contact</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($clinic->doctors as $doctor)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset($doctor->user->image ?? 'assets/images/profile/user-1.jpg') }}"
                                            alt="avatar" width="35" class="rounded-circle">
                                        <div class="ms-3">
                                            <h6 class="fw-semibold mb-0">{{ $doctor->user->name }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $doctor->specialty->name }}</td>
                                <td>{{ $doctor->user->email }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No doctors assigned to this clinic.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <h3 class="card-title">Appointments</h3>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($clinic->appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->patient->name }}</td>
                                <td>{{ $appointment->doctor->user->name }}</td>
                                <td>{{ $appointment->appointment_date }}</td>
                                <td>{{ ucfirst($appointment->status) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No appointments for this clinic.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
