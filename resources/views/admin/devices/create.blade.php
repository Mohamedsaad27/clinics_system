<x-admin-layout>

    {{-- Start Breadcrumb --}}
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Add Device</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted"
                                    href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a class="text-muted"
                                    href="{{ route('devices.index') }}">Devices</a></li>
                            <li class="breadcrumb-item" aria-current="page">Add Device</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    {{-- End Breadcrumb --}}

    <div class="card">
        <div class="card-body">
            <form class="row" action="{{ route('devices.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="mb-3">
                        <label for="device_name" class="form-label">Device Name</label>
                        <input type="text" class="form-control" id="device_name" name="device_name" placeholder="Enter device name"
                            value="{{ old('device_name') }}" required>
                        @error('device_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="device_number" class="form-label">Device Number</label>
                        <input type="text" class="form-control" id="device_number" name="device_number" placeholder="Enter device number"
                            value="{{ old('device_number') }}" required>
                        @error('device_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Enter device description"
                            required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="col-12 col-md-6 col-lg-6 col-xl-6">

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="">Select a status</option>
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="in maintenance" {{ old('status') == 'in maintenance' ? 'selected' : '' }}>In Maintenance</option>
                            <option value="decommissioned" {{ old('status') == 'decommissioned' ? 'selected' : '' }}>Decommissioned</option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Create Device</button>
                </div>
            </form>
        </div>
    </div>

</x-admin-layout>
