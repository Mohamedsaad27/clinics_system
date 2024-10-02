<x-admin-layout>
    <div class="card card-body shadow">
        <div class="row">
            <div class="col-md-12">
                <h4 class="card-title text-primary">Appointment Details</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="patient" class="form-label">Patient</label>
                    <input type="text" class="form-control rounded-pill" id="patient" value="{{ $appointment->patient->name }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="doctor" class="form-label">Doctor</label>
                    <input type="text" class="form-control rounded-pill" id="doctor" value="{{ $appointment->doctor->user->name }}" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="clinic" class="form-label">Clinic</label>
                    <input type="text" class="form-control rounded-pill" id="clinic" value="{{ $appointment->clinic->clinic_name }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="shift" class="form-label">Shift</label>
                    <input type="text" class="form-control rounded-pill" id="shift" value="{{ $appointment->shift->shift_month }} {{ $appointment->shift->shift_day_during_month }} from {{ $appointment->shift->start_time }} to {{ $appointment->shift->end_time }}" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="appointment_date" class="form-label">Appointment Date</label>
                    <input type="text" class="form-control rounded-pill" id="appointment_date" value="{{ $appointment->appointment_date }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="status" class="form-label">Status</label>
                    <input type="text" class="form-control rounded-pill" id="status" value="{{ $appointment->status }}" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('appointments.index') }}" class="btn btn-primary ">Back to Appointments</a>
            </div>
        </div>
    </div>
</x-admin-layout>
