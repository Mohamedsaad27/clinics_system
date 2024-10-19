<x-admin-layout>
    @push('scripts')
        <script>
            @if (Session::has('successCreate'))
                iziToast.success({
                    title: 'Success',
                    position: 'topRight',
                    message: '{{ Session::get('successCreate') }}',
                });
            @endif
            
            @if (Session::has('successDelete'))
                iziToast.success({
                    title: 'Success',
                    position: 'topRight',
                    message: '{{ Session::get('successDelete') }}',
                });
            @endif

            @if (Session::has('errorDelete'))
                iziToast.error({
                    title: 'Error',
                    position: 'topRight',
                    message: '{{ Session::get('errorDelete') }}',
                });
            @endif

            @if (Session::has('successUpdate'))
                iziToast.success({
                    title: 'Success',
                    position: 'topRight',
                    message: '{{ Session::get('successUpdate') }}',
                });
            @endif

            @if (Session::has('errorUpdate'))
                iziToast.error({
                    title: 'Error',
                    position: 'topRight',
                    message: '{{ Session::get('errorUpdate') }}',
                });
            @endif
            @if (Session::has('errorCreate'))
                iziToast.error({
                    title: 'Error',
                    position: 'topRight',
                    message: '{{ Session::get('errorCreate') }}',
                });
            @endif
            // Add this script to handle the delete confirmation modal
            $(document).ready(function() {
                $('.delete').click(function(e) {
                    e.preventDefault();
                    var form = $(this).closest('form');
                    $('#confirmDeleteModal').modal('show');
                    $('#confirmDelete').click(function() {
                        form.submit();
                    });
                });
            });
        </script>
    @endpush

    {{-- Start Bredcrump --}}
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Appointment List</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted"
                                    href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Appointment List</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    {{-- End Bredcrump --}}

    <div class="widget-content searchable-container list">
        <!-- --------------------- start Contact ---------------- -->
        <div class="card card-body">
            <div class="row">
                <div class="col-md-4 col-xl-3">
                    <form class="position-relative">
                        <input type="text" class="form-control product-search ps-5" id="input-search"
                            placeholder="Search Appointments...">
                        <i
                            class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                    </form>
                </div>
                <div
                    class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                    <a href="{{ route('appointments.create') }}" class="btn btn-info d-flex align-items-center">
                        <i class="ti ti-users text-white me-1 fs-5"></i> Add Appointment
                    </a>
                </div>
            </div>
        </div>
        <!-- --------------------- end Contact ---------------- -->

        <div class="card card-body">
            <div class="table-responsive">
                <div id="zero_config_wrapper" class="dataTables_wrapper">
                    <table id="zero_config" class="table border table-striped table-bordered text-nowrap dataTable"
                        aria-describedby="zero_config_info">
                        <thead>
                            <!-- start row -->
                            <tr>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1"
                                    colspan="1" aria-label="ID: activate to sort column ascending"
                                    style="width: 141.234px;">ID</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1"
                                    colspan="1" aria-label="Patient: activate to sort column ascending"
                                    style="width: 141.234px;">Patient</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1"
                                    colspan="1" aria-label="Doctor: activate to sort column ascending"
                                    style="width: 141.234px;">Doctor</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1"
                                    colspan="1" aria-label="Shift: activate to sort column ascending"
                                    style="width: 141.234px;">Shift</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1"
                                    colspan="1" aria-label="Clinic: activate to sort column ascending"
                                    style="width: 141.234px;">Clinic</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1"
                                    colspan="1" aria-label="Date: activate to sort column ascending"
                                    style="width: 141.234px;">Time</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1"
                                    colspan="1" aria-label="Status: activate to sort column ascending"
                                    style="width: 141.234px;">Status</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1"
                                    colspan="1" aria-label="SMS Sent: activate to sort column ascending"
                                    style="width: 141.234px;">SMS Sent</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1"
                                    colspan="1" aria-label="Actions: activate to sort column ascending"
                                    style="width: 70.8906px;">Actions</th>
                            </tr>

                            <!-- end row -->
                        </thead>
                        <tbody>
                            @foreach($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->id }}</td>
                                    <td>{{ $appointment->patient->name }}</td>
                                    <td>{{ $appointment->doctor->user->name }}</td>
                                    <td>{{ $appointment->shift->shift_month }} from {{ \Carbon\Carbon::parse($appointment->shift->start_time)->format('h:i A') }} to {{ \Carbon\Carbon::parse($appointment->shift->end_time)->format('h:i A') }}</td>
                                    <td>{{ $appointment->clinic->clinic_name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('h:i A') }}</td>
                                    <td>{{ $appointment->status }}</td>
                                    <td><span class="{{ $appointment->sms_sent ? 'text-success' : 'text-danger' }}">{{ $appointment->sms_sent ? 'Sending' : 'Not Send' }}</span></td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="bg-transparent border-0 delete p-0" type="button">
                                                    <i class="ti ti-trash text-danger fs-6"></i>
                                                </button>
                                            </form>
                                            <a href="{{ route('appointments.show', $appointment->id) }}" class="text-primary fs-6">
                                                <i class="ti ti-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-3">
                {{-- {{ $employees->links('pagination::bootstrap-5') }} --}}
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this appointment?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
