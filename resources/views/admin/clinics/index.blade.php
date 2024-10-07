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

            $(document).ready(function() {
                $('.delete-clinic').click(function(e) {
                    e.preventDefault();
                    var form = $(this).closest('form');
                    $('#confirmDeleteModal').modal('show');
                    $('#confirmDelete').click(function() {
                        form.submit();
                    });
                });
            });

            $('.medical-devices').click(function(e) {
                e.preventDefault();
                var devices = $(this).data('devices');
                var clinicName = $(this).data('clinic-name');
                var modal = $('#medicalDevicesModal');
                
                modal.find('.modal-title').text('Medical Devices - ' + clinicName);
                    
                    if (devices && devices.length > 0) {
                        var tableHtml = `
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Device Name</th>
                                        <th>Device Number</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>`;
                                
                        devices.forEach(device => {
                            tableHtml += `
                                <tr>
                                    <td>${device.device_name}</td>
                                    <td>${device.device_number}</td>
                                    <td>${device.description}</td>
                                    <td class="${device.status === 'active' ? 'text-success' : 'text-danger'}">${device.status.charAt(0).toUpperCase() + device.status.slice(1)}</td>
                                </tr>`;
                        });
                        
                        tableHtml += `
                                </tbody>
                            </table>`;
                        
                        modal.find('.modal-body').html(tableHtml);
                    } else {
                        modal.find('.modal-body').html('<p>No medical devices found for this clinic.</p>');
                    }
                    
                    modal.modal('show');
                });
            
        </script>
    @endpush
    {{-- Start Breadcrumb --}}
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Clinics</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Clinics</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <a href="{{ route('clinics.create') }}" class="btn btn-primary">Add New Clinic</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Breadcrumb --}}

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Department</th>
                            <th>Location</th>
                            <th>Contact Info</th>
                            <th>Medical Devices</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($clinics as $clinic)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="ms-2">
                                        <h6 class="fw-semibold mb-0">{{ $clinic->clinic_name }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $clinic->category->name }}</td>
                            <td>{{ $clinic->department->name ?? 'N/A' }}</td>
                            <td>{{ $clinic->location ?: 'N/A' }}</td>
                            <td>{{ $clinic->contact_info ?: 'N/A' }}</td>
                            <td>
                                <a href="#" class="medical-devices btn btn-sm btn-info"
                                   data-devices="{{ $clinic->devices }}"
                                   data-clinic-name="{{ $clinic->clinic_name }}">
                                    View Devices ({{ $clinic->devices->count() }})
                                </a>
                            </td>
                            <td>
                                <div class="action-btn d-flex">
                                    <a href="{{ route('clinics.show', $clinic->id) }}" class="text-info edit me-2">
                                        <i class="ti ti-eye fs-5"></i>
                                    </a>
                                    <a href="{{ route('clinics.edit', $clinic->id) }}" class="text-primary edit me-2">
                                        <i class="ti ti-edit fs-5"></i>
                                    </a>
                                    <form action="{{ route('clinics.destroy', $clinic->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="bg-transparent border-0 delete-clinic">
                                            <i class="ti ti-trash text-danger fs-6"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No clinics found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this Clinic?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="medicalDevicesModal" tabindex="-1" aria-labelledby="medicalDevicesModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- Changed modal-dialog to modal-lg for more width -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="medicalDevicesModalLabel">Medical Devices</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Devices will be dynamically added here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</x-admin-layout>
