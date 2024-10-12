<x-admin-layout>

    {{-- Start Breadcrumb --}}
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Add Clinic</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted"
                                    href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a class="text-muted"
                                    href="{{ route('clinics.index') }}">Clinics</a></li>
                            <li class="breadcrumb-item" aria-current="page">Add Clinic</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    {{-- End Breadcrumb --}}

    <form class="row" action="{{ route('clinics.update', $clinic->id) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Required for updating resources -->

        <div class="col-12 col-md-6 col-lg-6 col-xl-6">
            <div class="mb-3">
                <label for="clinic_name" class="form-label">Clinic Name</label>
                <input type="text" class="form-control" id="clinic_name" name="clinic_name"
                    value="{{ old('clinic_name', $clinic->clinic_name) }}" required>
                @error('clinic_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    <option value="">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $clinic->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-6 col-xl-6">
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                @if ($clinic->image)
                    <small>Current image: <img src="{{ asset('storage/' . $clinic->image) }}" alt="Clinic Image"
                            width="100"></small>
                @endif
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location"
                    value="{{ old('location', $clinic->location) }}" required>
                @error('location')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>  

            <div class="mb-3">
                <label for="contact_info" class="form-label">Phone</label>
                <input type="text" class="form-control" id="contact_info" name="contact_info"
                    value="{{ old('contact_info', $clinic->contact_info) }}" required>
                @error('contact_info')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">  
                <label class="form-label">Medical Devices</label>  
                {{-- <div class="form-check">  
                    <em>(Select multiple devices)</em>  
                </div>   --}}  
                <div class="form-control" style="max-height: 250px; overflow-y: auto; 
                overflow-x: hidden;">  
                    @if($medical_devices->isEmpty())  
                        <p>No devices to add</p>  
                    @else  
                        <div class="row">  
                            @foreach ($medical_devices as $index => $device)  
                                <div class="col-3">   
                                    <div class="form-check">  
                                        <input class="form-check-input" type="checkbox"   
                                               id="device_{{ $device->id }}"   
                                               name="medical_devices[]"   
                                               value="{{ $device->id }}"  
                                               @checked(in_array($device->id, old('medical_devices', $clinic->devices()->pluck('device_id')->toArray())))>  
                                        <label class="form-check-label" for="device_{{ $device->id }}">  
                                            {{ $device->device_name }}  
                                        </label>  
                                    </div>  
                                </div>  
                                @if (($index + 1) % 4 == 0 && $index < count($medical_devices) - 1)  
                                    </div><div class="row">  
                                @endif  
                            @endforeach  
                        </div>  
                    @endif  
                </div>  
                @error('medical_devices')  
                    <div class="text-danger">{{ $message }}</div>  
            @enderror  
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Update Clinic</button>
        </div>
    </form>


</x-admin-layout>
