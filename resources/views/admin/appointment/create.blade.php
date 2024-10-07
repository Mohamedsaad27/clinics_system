<x-admin-layout>

    {{-- Start Breadcrumb --}}
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Add Appointment</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted"
                                    href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a class="text-muted"
                                    href="{{ route('appointments.index') }}">Appointments</a></li>
                            <li class="breadcrumb-item" aria-current="page">Add Appointment</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    {{-- End Breadcrumb --}}

    <div class="card">
        <div class="card-body">
            <form class="row" action="{{ route('appointments.store') }}" method="POST">
                @csrf
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="mb-3">
                        <label for="patient_name" class="form-label">Patient Name</label>
                        <input type="text" class="form-control" id="patient_name" name="patient_name" required
                            placeholder="Patient Name">
                        <div id="patient-list" class="patient-list-style"></div>
                        @error('patient_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required
                            placeholder="Patient Email">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" required
                            placeholder="Patient Phone">
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" id="gender" name="gender" required placeholder="Patient Gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        @error('gender')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="mb-3">
                        <label for="department" class="form-label">Departments</label>
                        <select class="form-select" id="department" name="department_id" required>
                            <option value="">Select a Department</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('department_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="mb-3">
                        <label for="clinic" class="form-label">Clinics</label>
                        <select class="form-select" id="clinic" name="clinic_id" required>
                            <option selected value="">Select a Clinic</option>

                        </select>
                        @error('clinic_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="mb-3">
                        <label for="doctor" class="form-label">Doctors</label>
                        <select class="form-select" id="doctor" name="doctor_id" required>
                            <option selected value="">Select a Doctor</option>
                        </select>
                        <div class="mb-3 bg-success rounded p-2 d-none" id="shift-container">
                            <p class="mb-0 text-white" id="shift"></p>
                        </div>
                        @error('doctor_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="mb-3">
                        <label for="doctor" class="form-label">Medical Devices</label>
                        <select class="form-select" id="device" name="medical_device" required>
                            <option selected value="">Select a Medical Devices</option>
                        </select>
                        <div class="mb-3 bg-success rounded p-2 d-none" id="shift-container">
                            <p class="mb-0 text-white" id="shift"></p>
                        </div>
                        @error('medical_device')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="confirmed">Confirmed</option>
                            <option value="pending">Pending</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="mb-3">
                        <label for="appointment_date" class="form-label">Time</label>
                        <input type="time" class="form-control" id="appointment_date" name="appointment_date">
                        @error('appointment_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6 col-xl-6">

                </div>


                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Create Appointment</button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        {{-- Get Clinics By Department --}}
        <script>
            $(document).ready(function() {
                $('#department').change(function() {
                    var department_id = $(this).val();
                    if (department_id) {
                        $.ajax({
                            url: '/admin/get-clinics/' + department_id,
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                $('#clinic').empty();
                                $('#clinic').append(
                                    '<option disabled selected>Select Clinic</option>');
                                if (data.length > 0) {
                                    $.each(data, function(key, clinic) {
                                        $('#clinic').append('<option value="' + clinic.id +
                                            '">' +
                                            clinic.clinic_name + '</option>');
                                    });
                                } else {
                                    $('#clinic').append(
                                        '<option disabled>No clinics available</option>');
                                }
                            },
                            error: function() {
                                $('#clinic').empty();
                                $('#clinic').append(
                                    '<option disabled>Failed to load clinics</option>');
                            }
                        });
                    } else {
                        $('#clinic').empty();
                        $('#clinic').append('<option disabled selected>Select a department first</option>');
                    }
                });
            });
        </script>

        {{-- Patient Name Autocomplete --}}
        <script>
            $(document).ready(function() {
                $('#patient_name').keyup(function() {
                    var patient_name = $(this).val();
                    if (patient_name) {
                        $.ajax({
                            url: '/admin/get-patients/' + patient_name,
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                $('#patient-list').empty();
                                if (data.length > 0) {
                                    $.each(data, function(key, patient) {
                                        $('#patient-list').append(
                                            '<div><a href="#" class="text-dark">' +
                                            patient.name + '</a></div>');
                                    });
                                    $('#patient-list').slideDown();
                                } else {
                                    $('#patient-list').hide();
                                }
                            },
                            error: function() {
                                $('#patient-list').hide();
                            }
                        });
                    } else {
                        $('#patient-list').hide();
                    }
                });

                $(document).click(function(e) {
                    if ($(e.target).closest('#patient_name').length === 0) {
                        $('#patient-list').hide();
                    }
                });

                $('#patient-list').on('click', 'a', function(e) {
                    e.preventDefault();
                    $('#patient_name').val($(this).text());
                    $('#patient-list').hide();
                });
            });
        </script>

        {{-- Get Doctor By Clinic --}}
        <script>
            $(document).ready(function() {
                $('#clinic').change(function() {
                    var clinic_id = $(this).val();
                    if (clinic_id) {
                        $.ajax({
                            url: '/admin/get-doctors/' + clinic_id,
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                $('#doctor').empty();
                                $('#doctor').append(
                                    '<option disabled selected>Select Doctor</option>');
                                if (data.length > 0) {
                                    $.each(data, function(key, doctor) {
                                        $('#doctor').append('<option value="' + doctor.id +
                                            '">' +
                                            doctor.user.name + '</option>');
                                    });
                                } else {
                                    $('#doctor').append(
                                        '<option disabled>No doctors available</option>');
                                }
                            },
                            error: function() {
                                $('#doctor').empty();
                                $('#doctor').append(
                                    '<option disabled>Failed to load doctors</option>');
                            }
                        });
                    } else {
                        $('#doctor').empty();
                        $('#doctor').append('<option disabled selected>Select a Clinic first</option>');
                    }
                });
            });
        </script>
        {{-- Get Medical Device By Clinic --}}
        <script>
            $(document).ready(function() {
                $('#clinic').change(function() {
                    var clinic_id = $(this).val();
                    if (clinic_id) {
                        $.ajax({
                            url: '/admin/get-medical-device/' + clinic_id,
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                $('#device').empty();
                                $('#device').append(
                                    '<option disabled selected>Select Medical Device</option>');
                                if (data.length > 0) {
                                    $.each(data, function(key, device) {
                                        $('#device').append('<option value="' + device
                                            .device_id + '">' + device.device_name +
                                            '</option>');
                                    });
                                } else {
                                    $('#device').append(
                                        '<option disabled>No medical devices available</option>'
                                        );
                                }
                            },
                            error: function() {
                                $('#device').empty();
                                $('#device').append(
                                    '<option disabled>Failed to load medical devices</option>');
                            }
                        });
                    } else {
                        $('#device').empty();
                        $('#device').append('<option disabled selected>Select a Clinic first</option>');
                    }
                });
            });
        </script>
        {{-- Get Shift Doctor --}}

        <script>
            $(document).ready(function() {
                $('#doctor').change(function() {
                    var doctor_id = $(this).val();
                    if (doctor_id) {
                        $.ajax({
                            url: '/admin/get-shift/' + doctor_id,
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                $('#shift').empty();
                                $('#shift-container').removeClass('d-none');
                                if (data) {
                                    $('#shift').empty();
                                    $('#shift-container').removeClass(
                                        'd-none');
                                    $.each(data, function(key, shift) {
                                        $('#shift').append(
                                            'Shift Doctor Every: <span class="fw-bold text-blue">' +
                                            shift.shift_day_during_month +
                                            '</span> in <span class="fw-bold text-blue">' +
                                            shift.shift_month + '</span> Price: ' +
                                            '<span class="fw-bold text-blue">' +
                                            shift.price_appoinment +
                                            '</span> from <span class="fw-bold text-blue">' +
                                            shift.start_time +
                                            '</span> to <span class="fw-bold text-blue">' +
                                            shift.end_time + '</span>'
                                        );
                                        $('#shift').append(
                                            '<input type="hidden" name="shift_id" value="' +
                                            shift.id + '">'
                                        );
                                    });
                                } else {
                                    $('#shift').append(
                                        '<span class="text-white">No shifts available for this doctor</span>'
                                    );
                                }
                            },
                            error: function() {
                                $('#shift').empty();
                                $('#shift-container').removeClass(
                                    'd-none');
                                $('#shift').append(
                                    '<span class="text-white">Failed to load shifts. Please try again.</span>'
                                );
                            }
                        });
                    } else {
                        $('#shift').empty();
                        $('#shift-container').addClass('d-none'); // Hide the container if no doctor is selected
                        $('#shift').append('<span class="text-white">Select a Doctor first</span>');
                    }
                });
            });
        </script>
    @endpush

</x-admin-layout>
