<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-simplebar>
        <div class="d-flex mb-4 align-items-center justify-content-between">
            <a href="index.html" class="text-nowrap logo-img ms-0 ms-md-1">
                <img src="../assets/images/logos/dark-logo.svg" width="180" alt="">
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="mb-4 pb-2">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-5"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link primary-hover-bg {{ $currentRoute == 'admin.dashboard' ? 'active' : '' }}"
                        href="{{ route('admin.dashboard') }}" aria-expanded="false">
                        <span class="aside-icon p-2 bg-light-primary rounded-3">
                            <i class="ti ti-layout-dashboard fs-7 text-primary"></i>
                        </span>
                        <span class="hide-menu ms-2 ps-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-5"></i>
                    <span class="hide-menu">Control</span>
                </li>
                <li class="sidebar-item">
                    <a class="dropdown-toggle justify-content-between pe-4 sidebar-link sidebar-link primary-hover-bg {{ $currentRoute == 'admin.dashboard' ? 'primary-bg' : '' }}"
                        data-bs-toggle="collapse" data-bs-target="#homeSubmenu" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="aside-icon p-2 bg-light-primary rounded-3">
                                <i class="ti ti-article fs-7 text-primary"></i>
                            </span>
                            <span class="hide-menu ms-2 ps-1">Doctor</span>
                        </div>
                    </a>
                    <ul class="submenu collapse list-unstyled ms-21 me-5" id="homeSubmenu">
                        <li class="py-2 mb-1">
                            <a class="text-dark p-2" href="{{ route('doctors.create') }}">Add Doctor</a>
                        </li>
                        <li class="py-2 mb-1">
                            <a class="text-dark p-2" href="{{ route('doctors.index') }}">Doctor List</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="dropdown-toggle justify-content-between pe-4 sidebar-link sidebar-link primary-hover-bg {{ $currentRoute == 'admin.dashboard' ? 'primary-bg' : '' }}"
                        data-bs-toggle="collapse" data-bs-target="#employeeSubmenu" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="aside-icon p-2 bg-light-primary rounded-3">
                                <i class="ti ti-users fs-7 text-warning"></i>
                            </span>
                            <span class="hide-menu ms-2 ps-1">Employee</span>
                        </div>
                    </a>
                    <ul class="submenu collapse list-unstyled ms-21 me-5" id="employeeSubmenu">
                        <li class="py-2 mb-1">
                            <a class="text-dark p-2" href="{{ route('employees.create') }}">Add Employee</a>
                        </li>
                        <li class="py-2 mb-1">
                            <a class="text-dark p-2" href="{{ route('employees.index') }}">Employee List</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="dropdown-toggle justify-content-between pe-4 sidebar-link sidebar-link primary-hover-bg {{ $currentRoute == 'admin.dashboard' ? 'primary-bg' : '' }}"
                        data-bs-toggle="collapse" data-bs-target="#patientsSubmenu" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="aside-icon p-2 bg-light-primary rounded-3">
                                <i class="ti ti-users fs-7 text-warning"></i>
                            </span>
                            <span class="hide-menu ms-2 ps-1">Patients</span>
                        </div>
                    </a>
                    <ul class="submenu collapse list-unstyled ms-21 me-5" id="patientsSubmenu">
                        <li class="py-2 mb-1">
                            <a class="text-dark p-2" href="{{ route('patients.create') }}">Add Patients</a>
                        </li>
                        <li class="py-2 mb-1">
                            <a class="text-dark p-2" href="{{ route('patients.index') }}">Patient List</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="dropdown-toggle justify-content-between pe-4 sidebar-link sidebar-link primary-hover-bg {{ $currentRoute == 'admin.dashboard' ? 'primary-bg' : '' }}"
                        data-bs-toggle="collapse" data-bs-target="#clinicsSubmenu" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="aside-icon p-2 bg-light-primary rounded-3">
                                <i class="ti ti-building-hospital fs-7 text-warning"></i>
                            </span>
                            <span class="hide-menu ms-2 ps-1">Clinics</span>
                        </div>
                    </a>
                    <ul class="submenu collapse list-unstyled ms-21 me-5" id="clinicsSubmenu">
                        <li class="py-2 mb-1">
                            <a class="text-dark p-2" href="{{ route('clinics.create') }}">Add Clinic</a>
                        </li>
                        <li class="py-2 mb-1">
                            <a class="text-dark p-2" href="{{ route('clinics.index') }}">Clinic List</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
