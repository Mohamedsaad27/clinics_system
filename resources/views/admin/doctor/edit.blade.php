<x-admin-layout>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Edit Doctor</h5>
                <form class="row" action="{{ route('doctors.update', $doctor->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                value="{{ $doctor->user->name }}">
                            @error('name')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            @error('password')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="national_id" class="form-label">National ID</label>
                            <input type="text" class="form-control" id="national_id" name="national_id"
                                value="{{ $doctor->user->national_id }}">
                            @error('national_id')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Profile Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @error('image')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="qualification" class="form-label">Qualification</label>
                            <input type="text" class="form-control" id="qualification" name="qualification"
                                value="{{ $doctor->qualification }}">
                            @error('qualification')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">

                        <div class="mb-3">
                            <label for="specialty_id" class="form-label">Specialty</label>
                            <select class="form-select" id="specialty_id" name="specialty_id">
                                <option value="">Select a specialty</option>
                                @foreach($specialties as $specialty)
                                    <option value="{{ $specialty->id }}" @selected($specialty->id == $doctor->specialty_id)>
                                        {{ $specialty->name }}</option>
                                @endforeach
                            </select>
                            @error('specialty_id')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="department_id" class="form-label">Department</label>
                            <select class="form-select" id="department_id" name="department_id">
                                <option value="">Select a department</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}" @selected($department->id == $doctor->department_id)>
                                        {{ $department->name }}</option>
                                @endforeach
                            </select>
                            @error('department_id')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="clinic_id" class="form-label">Clinic</label>
                            <select class="form-select" id="clinic_id" name="clinic_id">
                                <option value="">Select a clinic</option>
                            </select>
                            @error('clinic_id')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender" name="gender">
                                <option value="">Select gender</option>
                                <option value="male" @selected('male' == $doctor->user->gender)>Male</option>
                                <option value="female" @selected('female' == $doctor->user->gender)>Female</option>
                            </select>
                            @error('gender')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone"
                                value="{{ $doctor->user->phone }}">
                            @error('phone')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="mb-3 row">
                            <div class="col-6">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" name="city"
                                    value="{{ $doctor->user->userAddresses->first()->city }}">
                                @error('city')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control" id="country" name="country"
                                    value="{{ $doctor->user->userAddresses->first()->country }}">
                                @error('country')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        

                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

        
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#department_id').change(function() {
                    var department_id = $(this).val();
                    if(department_id) {
                        $.ajax({
                            url: "{{ url('get-clinics') }}/"+department_id,
                            type: "GET",
                            dataType: "json",
                            success:function(data) {
                                $('#clinic_id').empty();
                                if($.isEmptyObject(data)) {
                                    $('#clinic_id').append('<option value="">No clinics available for this department</option>');
                                } else {
                                    $.each(data, function(key, value) {
                                        $('#clinic_id').append('<option value="'+ value.id +'">'+ value.clinic_name +'</option>');
                                    });
                                }
                            }
                        });
                    } else {
                        $('#clinic_id').empty();
                        $('#clinic_id').append('<option value="">Select a clinic</option>');
                    }
                });
            });
        </script>
    @endpush
</x-admin-layout>
