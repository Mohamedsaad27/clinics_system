<x-admin-layout>
    {{-- Start Breadcrumb --}}
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Shift Details</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('shifts.index') }}">Shifts</a></li>
                            <li class="breadcrumb-item" aria-current="page">Shift Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    {{-- End Breadcrumb --}}

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Shift Information</h5>
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Doctor:</strong> {{ $shift->doctor->name }}</p>
                    <p><strong>Clinic:</strong> {{ $shift->clinic->clinic_name }}</p>
                    <p><strong>Shift Date:</strong> {{ $shift->shift_date }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Start Time:</strong> {{ \Carbon\Carbon::parse($shift->start_time)->format('H:i') }}</p>
                    <p><strong>End Time:</strong> {{ \Carbon\Carbon::parse($shift->end_time)->format('H:i') }}</p>
                    <p><strong>Max Patients:</strong> {{ $shift->max_patients }}</p>
                </div>
            </div>

            <h5 class="card-title mt-4">Appointments</h5>
            @if($shift->appointments->count() > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Appointment Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($shift->appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->patient->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i') }}</td>
                                <td>{{ $appointment->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No appointments for this shift.</p>
            @endif

            <div class="text-end mt-3">
                <a href="{{ route('shifts.edit', $shift->id) }}" class="btn btn-primary">Edit Shift</a>
                <form action="{{ route('shifts.destroy', $shift->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this shift?')">Delete Shift</button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
