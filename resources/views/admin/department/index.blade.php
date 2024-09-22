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
                $('.delete-department').click(function(e) {
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

    {{-- Start Breadcrumb --}}
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Departments</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted"
                                    href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Departments</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3 text-end">
                    <a href="{{ route('departments.create') }}" class="btn btn-primary">Add Department</a>
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
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($departments as $department)
                            <tr>
                                <td>{{ $department->name }}</td>
                                <td>{{ $department->created_at->format('Y-m-d H:i') }}</td>
                                <td>{{ $department->updated_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    <a href="{{ route('departments.edit', $department->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-danger btn-sm delete-department">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No departments found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end mt-3">
                {{ $departments->links('pagination::bootstrap-5') }}
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
                    Are you sure you want to delete this department?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>


</x-admin-layout>
