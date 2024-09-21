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
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">

            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Employee List</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Employee List</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ asset('assets/images/breadcrumb/ChatBc.png') }}" alt="" class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="widget-content searchable-container list">
        <!-- --------------------- start Contact ---------------- -->
        <div class="card card-body">
            <div class="row">
                <div class="col-md-4 col-xl-3">
                    <form class="position-relative">
                        <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Search Employees...">
                        <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                    </form>
                </div>
                <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                    <a href="{{ route('employees.create') }}" class="btn btn-info d-flex align-items-center">
                        <i class="ti ti-users text-white me-1 fs-5"></i> Add Employee
                    </a>
                </div>
            </div>
        </div>
        <!-- ---------------------
                        end Contact
                    ---------------- -->
        <div class="card card-body">
            <div class="table-responsive">
                <div id="zero_config_wrapper" class="dataTables_wrapper">
                    <table id="zero_config" class="table border table-striped table-bordered text-nowrap dataTable" aria-describedby="zero_config_info">
                        <thead>
                            <!-- start row -->
                            <tr>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 141.234px;">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 141.234px;">Email</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 141.234px;">Phone</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending" style="width: 141.234px;">Department</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 141.234px;">Role</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 70.8906px;">Action</th>
                            </tr>
                            <!-- end row -->
                        </thead>
                        <tbody>
                            @forelse ($employees as $employee)
                                <tr class="odd">
                                    <td class="sorting_1">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset($employee->user->image ?? 'assets/images/profile/user-1.jpg') }}" alt="avatar" width="35" class="rounded-circle">
                                            <div class="ms-3">
                                                <div class="user-meta-info">
                                                    <h6 class="user-name mb-0" data-name="Emma Adams">{{ $employee->user->name }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="usr-email-addr">{{ $employee->user->email }}</span>
                                    </td>
                                    <td>
                                        <span class="usr-location">{{ $employee->user->phone }}</span>
                                    </td>
                                    <td>
                                        <span class="usr-ph-no">{{ $employee->department->name }}</span>
                                    </td>
                                    <td>
                                        <span class="usr-role">{{ $employee->role == 'receptionist' ? 'Receptionist' : 'Nurse' }}</span>
                                    </td>
                                    <td>

                                        <div class="action-btn d-flex">
                                            <a href="{{ route('employees.show', $employee->id) }}" class="text-info edit me-2">
                                                <i class="ti ti-eye fs-5"></i>
                                            </a>
                                            <a href="{{ route('employees.edit', $employee->id) }}" class="text-primary edit me-2">
                                                <i class="ti ti-edit fs-5"></i>
                                            </a>
                                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button class="bg-transparent border-0 delete p-0" type="button">
                                                    <i class="ti ti-trash text-danger fs-6"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <p class="text-center">There are no employees</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this employee?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>

   

</x-admin-layout>
