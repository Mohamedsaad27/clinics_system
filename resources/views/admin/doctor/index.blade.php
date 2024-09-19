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
        </script>
    @endpush

    <div class="card-body p-4">
        <div class="d-flex mb-4 justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold">Show Doctors</h5>

            <div class="dropdown">
                <button id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"
                    class="rounded-circle btn-transparent btn-sm px-1 btn shadow-none">
                    <i class="ti ti-dots-vertical fs-7 d-block"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1" style="">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li>
                        <a class="dropdown-item" href="#">Another action</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="table-responsive" data-simplebar="init">
            <div class="simplebar-wrapper" style="margin: 0px;">
                <div class="simplebar-height-auto-observer-wrapper">
                    <div class="simplebar-height-auto-observer"></div>
                </div>
                <div class="simplebar-mask">
                    <div class="simplebar-offset" style="right: 0px; bottom: 0px; overflow:auto;">
                        <div class="simplebar-content-wrapper" style="overflow: vis;" tabindex="0" role="region"
                            aria-label="scrollable content" style="height: auto;">
                            <div class="simplebar-content" style="padding: 0px;">
                                <table class="table table-borderless align-middle text-nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">National ID</th>
                                            <th scope="col">Qualification</th>
                                            <th scope="col">Specialty</th>
                                            <th scope="col">Department</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Years of Experience</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($doctors as $doctor)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-2">
                                                            <img src="{{ asset($doctor->user->image_url) }}"
                                                                width="50" class="rounded-circle" alt="">
                                                        </div>

                                                        <div>
                                                            <h6 class="mb-1 fw-bolder">{{ $doctor->user->name }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="fs-3 fw-normal mb-0">{{ $doctor->user->email }}</p>
                                                </td>
                                                <td>
                                                    <p class="fs-3 fw-normal mb-0">
                                                        {{ $doctor->user->national_id }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="fs-3 fw-normal mb-0">
                                                        {{ $doctor->qualification }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="fs-3 fw-normal mb-0">
                                                        {{ $doctor->specialty->name }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="fs-3 fw-normal mb-0">
                                                        {{ $doctor->department->name }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="fs-3 fw-normal mb-0">
                                                        {{ $doctor->user->gander }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="fs-3 fw-normal mb-0">
                                                        {{ $doctor->user->phone }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="fs-3 fw-normal mb-0">
                                                        {{ $doctor->experience_years }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="fs-3 fw-normal mb-0">
                                                        @foreach ($doctor->user->userAddresses as $address)
                                                            {{ $address->is_main == true ? $address->city | $address->country : '' }}
                                                        @endforeach
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <form action="{{ route('doctors.destroy', $doctor->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure you want to delete this doctor?');">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="bg-transparent border-0" type="submit">
                                                                <i class="ti ti-trash text-danger fs-6"></i>
                                                            </button>
                                                        </form>

                                                        <form action="{{ route('doctors.edit', $doctor->id) }}"
                                                            method="GET">
                                                            <button class="bg-transparent border-0" type="submit"><i
                                                                    class="ti ti-pencil text-blue fs-6"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="20">
                                                    <p class="text-center">There are no doctors</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simplebar-placeholder" style="width: auto; height: 357px;"></div>
            </div>
            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
            </div>
            <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
            </div>
        </div>
    </div>

</x-admin-layout>
