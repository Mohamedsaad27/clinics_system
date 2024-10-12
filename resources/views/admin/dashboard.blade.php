<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .dashboard-card {
            transition: transform 0.3s;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
        }
        .card-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
        }
        .card-text {
            font-size: 2rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <x-admin-layout>
        <div class="container-fluid py-4">
            <div class="row g-4">
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card bg-primary text-white h-100 dashboard-card">
                        <div class="card-body text-center">
                            <i class="fas fa-calendar-check card-icon"></i>
                            <h5 class="card-title">Total Appointments</h5>
                            <p class="card-text">{{ App\Models\Appointment::count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card bg-success text-white h-100 dashboard-card">
                        <div class="card-body text-center">
                            <i class="fas fa-hospital card-icon"></i>
                            <h5 class="card-title">Total Clinics</h5>
                            <p class="card-text">{{ App\Models\Clinic::count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card bg-info text-white h-100 dashboard-card">
                        <div class="card-body text-center">
                            <i class="fas fa-user-md card-icon"></i>
                            <h5 class="card-title">Total Doctors</h5>
                            <p class="card-text">{{ App\Models\Doctor::count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card bg-warning text-white h-100 dashboard-card">
                        <div class="card-body text-center">
                            <i class="fas fa-users card-icon"></i>
                            <h5 class="card-title">Total Patients</h5>
                            <p class="card-text">{{ App\Models\User::where('type', 'patient')->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card bg-secondary text-white h-100 dashboard-card">
                        <div class="card-body text-center">
                            <i class="fas fa-user-tie card-icon"></i>
                            <h5 class="card-title">Total Admins</h5>
                            <p class="card-text">{{ App\Models\User::where('type', 'admin')->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card bg-danger text-white h-100 dashboard-card">
                        <div class="card-body text-center">
                            <i class="fas fa-user-friends card-icon"></i>
                            <h5 class="card-title">Total Receptionists</h5>
                            <p class="card-text">{{ App\Models\User::where('type', 'reciepcent_employee')->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card bg-light text-dark h-100 dashboard-card">
                        <div class="card-body text-center">
                            <i class="fas fa-user-nurse card-icon"></i>
                            <h5 class="card-title">Total Nurses</h5>
                            <p class="card-text">{{ App\Models\User::where('type', 'nurse_employee')->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-admin-layout>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>