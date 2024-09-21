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

            // Add this script to handle the delete confirmation modal
            $(document).ready(function() {
                $('.delete-doctor').click(function(e) {
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
                    <h4 class="fw-semibold mb-8">Doctor List</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted"
                                    href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Doctor List</li>
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
                            placeholder="Search Doctors...">
                        <i
                            class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                    </form>
                </div>
                <div
                    class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                    <a href="{{ route('doctors.create') }}" class="btn btn-info d-flex align-items-center">
                        <i class="ti ti-users text-white me-1 fs-5"></i> Add Doctor
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
                                    colspan="1" aria-label="Name: activate to sort column ascending"
                                    style="width: 141.234px;">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1"
                                    colspan="1" aria-label="Email: activate to sort column ascending"
                                    style="width: 141.234px;">Email</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1"
                                    colspan="1" aria-label="National ID: activate to sort column ascending"
                                    style="width: 141.234px;">National ID</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1"
                                    colspan="1" aria-label="Qualification: activate to sort column ascending"
                                    style="width: 141.234px;">Qualification</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1"
                                    colspan="1" aria-label="Specialty: activate to sort column ascending"
                                    style="width: 141.234px;">Specialty</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1"
                                    colspan="1" aria-label="Department: activate to sort column ascending"
                                    style="width: 141.234px;">Department</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1"
                                    colspan="1" aria-label="Gender: activate to sort column ascending"
                                    style="width: 141.234px;">Gender</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1"
                                    colspan="1" aria-label="Phone: activate to sort column ascending"
                                    style="width: 141.234px;">Phone</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1"
                                    colspan="1" aria-label="Years of Experience: activate to sort column ascending"
                                    style="width: 141.234px;">Years of Experience</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1"
                                    colspan="1" aria-label="Address: activate to sort column ascending"
                                    style="width: 141.234px;">Address</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1"
                                    colspan="1" aria-label="Actions: activate to sort column ascending"
                                    style="width: 70.8906px;">Actions</th>
                            </tr>

                            <!-- end row -->
                        </thead>
                        <tbody>
                            @forelse($doctors as $doctor)
                                <tr class="odd">
                                    <td class="sorting_1">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset($doctor->user->image_url ?? 'assets/images/profile/user-1.jpg') }}"
                                                alt="avatar" width="35" class="rounded-circle">
                                            <div class="ms-3">
                                                <h6 class="user-name mb-0">{{ $doctor->user->name }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="usr-email-addr">{{ $doctor->user->email }}</span>
                                    </td>
                                    <td>
                                        <span class="usr-id">{{ $doctor->user->national_id }}</span>
                                    </td>
                                    <td>
                                        <span class="usr-qualification">{{ $doctor->qualification }}</span>
                                    </td>
                                    <td>
                                        <span class="usr-specialty">{{ $doctor->specialty->name }}</span>
                                    </td>
                                    <td>
                                        <span class="usr-department">{{ $doctor->department->name }}</span>
                                    </td>
                                    <td>
                                        <span class="usr-gender">{{ $doctor->user->gender }}</span>
                                    </td>
                                    <td>
                                        <span class="usr-phone">{{ $doctor->user->phone }}</span>
                                    </td>
                                    <td>
                                        <span class="usr-experience">{{ $doctor->experience_years }}</span>
                                    </td>
                                    <td>
                                        <span class="usr-address">
                                            {{ $doctor->user->userAddresses->first()->city }},
                                            {{ $doctor->user->userAddresses->first()->country }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-btn d-flex">
                                            <a href="{{ route('doctors.edit', $doctor->id) }}"
                                                class="text-primary edit me-2">
                                                <i class="ti ti-edit fs-5"></i>
                                            </a>
                                            <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST"
                                                class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button class="bg-transparent border-0 delete-doctor p-0"
                                                    type="button">
                                                    <i class="ti ti-trash text-danger fs-6"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11">
                                        <p class="text-center">There are no doctors</p>
                                    </td>
                                </tr>
                            @endforelse

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
                    Are you sure you want to delete this doctor?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
