<aside class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#doctorsSubmenu" aria-expanded="false">
                    Doctors
                </a>
                <ul class="collapse nav flex-column" id="doctorsSubmenu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.doctors.create') }}">Add Doctor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.doctors.index') }}">View Doctors</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#employeesSubmenu" aria-expanded="false">
                    Employees
                </a>
                <ul class="collapse nav flex-column" id="employeesSubmenu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.employees.create') }}">Add Employee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.employees.index') }}">View Employees</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>
