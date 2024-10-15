<x-admin-layout>
    <style>
        /* Ensure the parent container is positioned relative for proper dropdown alignment */
        .position-relative {
            position: relative;
        }
    
        /* Autocomplete list container directly under the input field */
        .patient-list-style {
            position: absolute;
            top: 100%; /* Aligns the list just below the input */
            left: 0;
            width: 100%;
            max-height: 200px;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            z-index: 1000;
            display: none; /* Hidden by default */
        }
    
        /* Individual autocomplete item */
        .patient-list-style div {
            padding: 8px 12px;
            cursor: pointer;
        }
    
        /* Hover effect for items */
        .patient-list-style div:hover {
            background-color: #f1f1f1;
        }
    
        /* Links inside the autocomplete list */
        .patient-list-style a {
            color: #000;
            text-decoration: none;
        }
    
        .patient-list-style a:hover {
            text-decoration: underline;
        }
    </style>
    
    


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
                <div class="col-12 col-md-6 col-lg-6 col-xl-6 position-relative">
                    <div class="mb-3">
                        <label for="patient_name" class="form-label">Patient Name</label>
                        <input type="text" class="form-control" id="patient_name" name="patient_name" required
                            placeholder="Patient Name">
                        <div id="patient-list" class="patient-list-style"></div> <!-- Suggestions container -->
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

                {{-- <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="mb-3">
                        <label for="doctor" class="form-label">Doctors</label>
                        <div class="input-group">
                            <select class="form-select" id="doctor" name="doctor_id" required>
                                <option selected value="">Select a Doctor</option>
                            </select>
                            <button class="btn btn-outline-secondary" type="button" id="viewShiftsBtn" disabled>
                                View Shifts
                            </button>
                        </div>
                        @error('doctor_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div> --}}
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="mb-3">
                        <label for="doctor" class="form-label">Doctors</label>
                        <div class="input-group">
                            <select class="form-select" id="doctor" name="doctor_id" required>
                                <option selected value="">Select a Doctor</option>
                            </select>
                            <button class="btn btn-outline-secondary" type="button" id="viewShiftsBtn" disabled>
                                View Shifts
                            </button>
                        </div>
                        @error('doctor_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                
                        <!-- Styled Shift Display -->
                        <div class="mt-2">
                            <div class="alert alert-info d-none" id="shift-container">
                                <strong>Selected Shift:</strong>
                                <p class="mb-0" id="shift-details"></p>
                            </div>
                        </div>
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
    <div class="modal fade" id="doctorShiftsModal" tabindex="-1" aria-labelledby="doctorShiftsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="doctorShiftsModalLabel">
                        <i class="fas fa-calendar-alt me-2"></i>Doctor Shifts
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="doctorShiftsTable">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-calendar-day me-2"></i>Date</th>
                                    <th><i class="fas fa-clock me-2"></i>Start Time</th>
                                    <th><i class="fas fa-hourglass-end me-2"></i>End Time</th>
                                    <th><i class="fas fa-dollar-sign me-2"></i>Price</th>
                                </tr>
                            </thead>
                            <tbody id="doctorShiftsContent">
                                <!-- Shifts will be loaded here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
            const viewShiftsBtn = $('#viewShiftsBtn');
            const doctorSelect = $('#doctor');
            const shiftsModal = new bootstrap.Modal(document.getElementById('doctorShiftsModal'));
            let selectedShift = null; // Variable to store selected shift details
        
            doctorSelect.change(function() {
                viewShiftsBtn.prop('disabled', !$(this).val());
            });
        
            // View shifts for the selected doctor
            viewShiftsBtn.click(function() {
                const doctorId = doctorSelect.val();
                if (doctorId) {
                    $.ajax({
                        url: '/admin/get-shift/' + doctorId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            let shiftsHtml = '';
                            if (data.length > 0) {
                                data.forEach(function(shift) {
                                    shiftsHtml += `
                                        <tr data-shift='${JSON.stringify(shift)}' class="select-shift">
                                            <td>${shift.shift_day_during_month} ${shift.shift_month}</td>
                                            <td>${shift.start_time}</td>
                                            <td>${shift.end_time}</td>
                                            <td>${shift.price_appoinment}</td>
                                        </tr>
                                    `;
                                });
                            } else {
                                shiftsHtml = '<tr><td colspan="4" class="text-center">No shifts available for this doctor.</td></tr>';
                            }
                            $('#doctorShiftsContent').html(shiftsHtml);
                            shiftsModal.show();
                        },
                        error: function() {
                            $('#doctorShiftsContent').html('<tr><td colspan="4" class="text-center text-danger">Failed to load doctor shifts.</td></tr>');
                            shiftsModal.show();
                        }
                    });
                }
            });
        
            // Capture the shift selection
            $(document).on('click', '.select-shift', function() {
                selectedShift = $(this).data('shift'); // Store the selected shift details
                $('#shift-container').removeClass('d-none');
                $('#shift-details').html(`<strong>Date:</strong> ${selectedShift.shift_day_during_month} ${selectedShift.shift_month}  <strong>Time:</strong> ${selectedShift.start_time} - ${selectedShift.end_time} <strong>Price:</strong> ${selectedShift.price_appoinment}`);
                shiftsModal.hide();
            });
            // Add shift details to the form before submitting
            $('form').submit(function(event) {
                if (selectedShift) {
                    $('<input>').attr({
                        type: 'hidden',
                        name: 'shift_id',
                        value: selectedShift.id
                    }).appendTo($(this));
                    $('<input>').attr({
                        type: 'hidden',
                        name: 'shift_date',
                        value: selectedShift.shift_day_during_month + ' ' + selectedShift.shift_month
                    }).appendTo($(this));
                    $('<input>').attr({
                        type: 'hidden',
                        name: 'shift_start_time',
                        value: selectedShift.start_time
                    }).appendTo($(this));
                    $('<input>').attr({
                        type: 'hidden',
                        name: 'shift_end_time',
                        value: selectedShift.end_time
                    }).appendTo($(this));
                    $('<input>').attr({
                        type: 'hidden',
                        name: 'shift_price',
                        value: selectedShift.price_appoinment
                    }).appendTo($(this));
                }
            });
        });
    </script>

    @endpush

</x-admin-layout>
