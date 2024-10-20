<x-admin-layout>  
    <head>  
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>  
    </head>  
    
    {{-- Start Breadcrumb --}}  
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">  
        <div class="card-body px-4 py-3">  
            <div class="row align-items-center">  
                <div class="col-9">  
                    <h4 class="fw-semibold mb-8">Add Clinic</h4>  
                    <nav aria-label="breadcrumb">  
                        <ol class="breadcrumb">  
                            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('admin.dashboard') }}">Dashboard</a></li>  
                            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('clinics.index') }}">Clinics</a></li>  
                            <li class="breadcrumb-item" aria-current="page">Add Clinic</li>  
                        </ol>  
                    </nav>  
                </div>  
            </div>  
        </div>  
    </div>  
    {{-- End Breadcrumb --}}  
    
    <div class="card">  
        <div class="card-body">  
            <form class="row" action="{{ route('clinics.store') }}" method="POST" enctype="multipart/form-data">  
                @csrf  
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">  
                    <div class="mb-3">  
                        <label for="clinic_name" class="form-label">Clinic Name</label>  
                        <input type="text" class="form-control" id="clinic_name" name="clinic_name" placeholder="Enter clinic name"  
                            value="{{ old('clinic_name') }}" required>  
                        @error('clinic_name')  
                            <div class="text-danger">{{ $message }}</div>  
                        @enderror  
                    </div>  
    
                    <div class="mb-3">  
                        <label for="category_id" class="form-label">Category</label>  
                        <select class="form-select" id="category_id" name="category_id" required>  
                            <option value="">Select a category</option>  
                            @foreach ($categories as $category)  
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>  
                                    {{ $category->name }}  
                                </option>  
                            @endforeach  
                        </select>  
                        @error('category_id')  
                            <div class="text-danger">{{ $message }}</div>  
                        @enderror  
                    </div>  
    
                    <div class="mb-3">  
                        <label for="department" class="form-label">Departments</label>  
                        <select class="form-select" id="department" name="department_id" required>  
                            <option value="">Select a Department</option>  
                            @foreach ($departments as $department)  
                                <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>  
                                    {{ $department->name }}  
                                </option>  
                            @endforeach  
                        </select>  
                        @error('department_id')  
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
                                                       {{ in_array($device->id, old('medical_devices', [])) ? 'checked' : '' }}>  
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
                </div>  
    
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">  
    
                    <div class="mb-3">  
                        <label for="location" class="form-label">Location</label>  
                        <input type="text" class="form-control" id="location" name="location" placeholder="Enter clinic location"  
                            value="{{ old('location') }}" required>  
                        @error('location')  
                            <div class="text-danger">{{ $message }}</div>  
                        @enderror  
                    </div>  
    
                    <div class="mb-3">  
                        <label for="contact_info" class="form-label">Phone</label>  
                        <input type="text" class="form-control" id="contact_info" name="contact_info" placeholder="Enter clinic phone"  
                            value="{{ old('contact_info') }}" required>  
                        @error('contact_info')  
                            <div class="text-danger">{{ $message }}</div>  
                        @enderror  
                    </div>  
                </div>  
    
                <div class="col-12">  
                    <button type="submit" class="btn btn-primary">Create Clinic</button>  
                </div>  
            </form>  
        </div>  
    </div>  
    
    {{-- @push('scripts')  
    <script>  
        $(document).ready(function() {  
            $('#medical_devices').select2({  
                placeholder: "Select medical devices",  // نص في حالة عدم اختيار شيء  
                allowClear: true,  // السماح للمستخدم بمسح الاختيار  
                theme: 'bootstrap-5'  // استخدام تصميم Bootstrap 5  
            });  
        });  
    </script>    
    @endpush    --}}
    
    </x-admin-layout>