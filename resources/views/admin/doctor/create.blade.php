<x-admin-layout>

    {{-- Start Breadcrumb --}}
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Add Doctor</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted"
                                    href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a class="text-muted"
                                    href="{{ route('doctors.index') }}">Doctors</a></li>
                            <li class="breadcrumb-item" aria-current="page">Add Doctor</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    {{-- End Breadcrumb --}}

    <div class="card">
        <div class="card-body">
            <form class="row" action="{{ route('doctors.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" class="form-control" name="name" id="name"
                            value="{{ old('name') }}">
                        @error('name')
                            <div class="form-text text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="email"
                            value="{{ old('email') }}" aria-describedby="emailHelp">
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
                            value="{{ old('national_id') }}">
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
                            value="{{ old('image') }}">
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
                            value="{{ old('qualification') }}">
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
                                <option value="{{ $specialty->id }}" @selected($specialty->id == old('specialty_id'))>
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
                                <option value="{{ $department->id }}" @selected($department->id == old('department_id'))>
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
                            <option value="male" @selected('male' == old('gender'))>Male</option>
                            <option value="female" @selected('female' == old('gender'))>Female</option>
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
                            value="{{ old('phone') }}">
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
                            min="0" value="{{ old('experience_years') }}">
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

</x-admin-layout>
