<x-admin-layout>

    {{-- Start Breadcrumb --}}
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Edit Department</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted"
                                    href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a class="text-muted"
                                    href="{{ route('departments.index') }}">Departments</a></li>
                            <li class="breadcrumb-item" aria-current="page">Edit Department</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    {{-- End Breadcrumb --}}

    <div class="card">
        <div class="card-body">
            <form class="row" action="{{ route('departments.update', $department->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="col-12">
                    <div class="mb-3">
                        <label for="name" class="form-label">Department Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name', $department->name) }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Update Department</button>
                </div>
            </form>
        </div>
    </div>

</x-admin-layout>
