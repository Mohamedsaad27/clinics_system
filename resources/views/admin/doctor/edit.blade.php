<x-admin-layout>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Add New Doctor</h5>
                <form class="row" action="{{ route('doctors.edit', $doctor->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="name" class="form-control" name="name" id="name"
                                value="{{ old('name', $doctor->user->name) }}">
                            @error('name')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="email"
                                value="{{ old('email', $doctor->user->email) }}" aria-describedby="emailHelp">
                            @error('email')
                                <div class="form-text text-danger">
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                value="{{ old('password') }}">
                            @error('password')
                                <div class="form-text text-danger">
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="national_id" class="form-label">National ID</label>
                            <input type="text" class="form-control" id="national_id" name="national_id"
                                value="{{ old('national_id', $doctor->user->national_id) }}">
                            @error('national_id')
                                <div class="form-text text-danger">
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Profile Image</label>
                            <input type="file" class="form-control" id="image" name="image"
                                value="{{ old('image', $doctor->user->image_url) }}">
                            @error('image')
                                <div class="form-text text-danger">
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="qualification" class="form-label">Qualification</label>
                            <input type="text" class="form-control" id="qualification" name="qualification"
                                value="{{ old('qualification', $doctor->qualification) }}">
                            @error('qualification')
                                <div class="form-text text-danger">
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">

                        <div class="mb-3">
                            <label for="specialty_id" class="form-label">Specialty</label>
                            <select class="form-select" id="specialty_id" name="specialty_id">
                                <option value="">Select a specialty</option>
                                @forelse($specialties as $specialty)
                                    <option value="{{ $specialty->id }}" @selected($specialty->id == old('specialty_id', $doctor->specialty_id))>
                                        {{ $specialty->name }}</option>
                                @empty
                                    <option value="">There is no specialization</option>
                                @endforelse
                            </select>
                            @error('specialty_id')
                                <div class="form-text text-danger">
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="department_id" class="form-label">Department</label>
                            <select class="form-select" id="department_id" name="department_id">
                                <option value="">Select a department</option>
                                @forelse($departments as $department)
                                    <option value="{{ $department->id }}" @selected($department->id == old('department_id', $doctor->department_id))>
                                        {{ $department->name }}</option>
                                @empty
                                    <option value="">There is no Departments</option>
                                @endforelse
                            </select>
                            @error('department_id')
                                <div class="form-text text-danger">
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender" name="gender">
                                <option value="">Select gender</option>
                                <option value="male" @selected('male' == old('gender', $doctor->user->gender))>Male</option>
                                <option value="female" @selected('female' == old('gender', $doctor->user->gender))>Female</option>
                            </select>
                            @error('gender')
                                <div class="form-text text-danger">
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone"
                                value="{{ old('phone', $doctor->user->phone) }}">
                            @error('phone')
                                <div class="form-text text-danger">
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="experience_years" class="form-label">Years of Experience</label>
                            <input type="number" class="form-control" id="experience_years" name="experience_years"
                                min="0" value="{{ old('experience_years', $doctor->experience_years) }}">
                            @error('experience_years')
                                <div class="form-text text-danger">
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="row mb-3">

                            <div class="col-6">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" name="city"
                                    value="{{ old('city') }}">
                                @error('city')
                                    <div class="form-text text-danger">
                                        <div class="form-text text-danger">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control" id="country" name="country"
                                    value="{{ old('country') }}">
                                @error('country')
                                    <div class="form-text text-danger">
                                        <div class="form-text text-danger">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                            </div>

                        </div>

                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-admin-layout>
