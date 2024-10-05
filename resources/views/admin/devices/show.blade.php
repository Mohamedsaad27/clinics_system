<x-admin-layout>
    {{-- Start Breadcrumb --}}
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Device Details</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('devices.index') }}">Devices</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $medicalDevice->device_name }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        {{-- <a href="{{ route('devices.edit', ['device' => $medicalDevice->id]) }}" class="btn btn-primary">Edit Device</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Breadcrumb --}}

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="mb-4">{{ $medicalDevice->device_name }}</h2>
                    <p><strong>Device Number:</strong> {{ $medicalDevice->device_number }}</p>
                    <p><strong>Description:</strong> {{ $medicalDevice->description }}</p>
                    <p><strong>Status:</strong> {{ $medicalDevice->status }}</p>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
