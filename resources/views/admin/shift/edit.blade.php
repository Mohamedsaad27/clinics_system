<x-admin-layout>
    {{-- Start Breadcrumb --}}
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Edit Shift</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('shifts.index') }}">Shifts</a></li>
                            <li class="breadcrumb-item" aria-current="page">Edit Shift</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    {{-- End Breadcrumb --}}

    <div class="card">
        <div class="card-body">
            <form action="{{ route('shifts.update', $shift->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="doctor_id" class="form-label">Doctor</label>
                    <select class="form-select" id="doctor_id" name="doctor_id" required>
                        <option value="">Select a doctor</option>
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}" {{ old('doctor_id', $shift->doctor_id) == $doctor->id ? 'selected' : '' }}>
                                {{ $doctor->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('doctor_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="clinic_id" class="form-label">Clinic</label>
                    <select class="form-select" id="clinic_id" name="clinic_id" required>
                        <option value="">Select a clinic</option>
                        @foreach ($clinics as $clinic)
                            <option value="{{ $clinic->id }}" {{ old('clinic_id', $shift->clinic_id) == $clinic->id ? 'selected' : '' }}>
                                {{ $clinic->clinic_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('clinic_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="shift_date" class="form-label">Shift Date</label>
                    <input type="date" class="form-control" id="shift_date" name="shift_date" value="{{ old('shift_date', $shift->shift_date) }}" required>
                    @error('shift_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="start_time" class="form-label">Start Time</label>
                    <input type="time" class="form-control" id="start_time" name="start_time" value="{{ old('start_time', \Carbon\Carbon::parse($shift->start_time)->format('H:i')) }}" required>
                    @error('start_time')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="end_time" class="form-label">End Time</label>
                    <input type="time" class="form-control" id="end_time" name="end_time" value="{{ old('end_time', \Carbon\Carbon::parse($shift->end_time)->format('H:i')) }}" required>
                    @error('end_time')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="max_patients" class="form-label">Max Patients</label>
                    <input type="number" class="form-control" id="max_patients" name="max_patients" value="{{ old('max_patients', $shift->max_patients) }}" required min="1">
                    @error('max_patients')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Update Shift</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
