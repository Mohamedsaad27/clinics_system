<x-admin-layout>
    {{-- Start Breadcrumb --}}
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Edit Shift</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted"
                                    href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a class="text-muted"
                                    href="{{ route('shifts.index') }}">Shifts</a></li>
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
            <form class="row" action="{{ route('shifts.update', $shift->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Use the PUT method for updating -->

                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="mb-3">
                        <label for="doctor_id" class="form-label">Doctor</label>
                        <select class="form-select" id="doctor_id" name="doctor_id" required>
                            <option value="">Select a doctor</option>
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}"
                                    {{ old('doctor_id', $shift->doctor_id) == $doctor->id ? 'selected' : '' }}>
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
                                <option value="{{ $clinic->id }}"
                                    {{ old('clinic_id', $shift->clinic_id) == $clinic->id ? 'selected' : '' }}>
                                    {{ $clinic->clinic_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('clinic_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="shift_month" class="form-label">Shift Month</label>
                        <input type="month" class="form-control" id="shift_month" name="shift_month"
                            value="{{ old('shift_month', $shift->shift_month) }}" required>
                        @error('shift_month')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="shift_day_during_month" class="form-label">Shift Day During This Month</label>
                        <select class="form-select" id="shift_day_during_month" name="shift_day_during_month" required>
                            @foreach ($days as $day)
                                <option value="{{ $day }}"
                                    {{ old('shift_day_during_month', $shift->shift_day_during_month) == $day ? 'selected' : '' }}>
                                    {{ ucfirst($day) }}
                                </option>
                            @endforeach
                        </select>
                        @error('shift_day_during_month')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="mb-3">
                        <label for="start_time" class="form-label">Start Time</label>
                        <input type="time" class="form-control" id="start_time" name="start_time"
                            value="{{ old('end_time', \Carbon\Carbon::parse($shift->start_time)->format('H:i')) }}"
                            required>
                        @error('start_time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="end_time" class="form-label">End Time</label>
                        <input type="time" class="form-control" id="end_time" name="end_time"
                            value="{{ old('end_time', \Carbon\Carbon::parse($shift->end_time)->format('H:i')) }}"
                            required>
                        @error('end_time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="max_patients" class="form-label">Maximum Patients</label>
                        <input type="number" class="form-control" id="max_patients" name="max_patients"
                            value="{{ old('max_patients', $shift->max_patients) }}" min="1" required>
                        @error('max_patients')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price_appoinment" class="form-label">Price Appoinment</label>
                        <input type="number" class="form-control" id="price_appoinment" name="price_appoinment"
                            value="{{ old('price_appoinment') }}" min="1" required>
                        @error('price_appoinment')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Update Shift</button>
                </div>
            </form>

        </div>
    </div>
</x-admin-layout>
