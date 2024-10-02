<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clinics System</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- iziToast CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard/styles.min.css') }}" />
</head>


<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <!-- Sidebar Start -->
        @include('layouts.admin.partials.sidebar')
        <!--  Sidebar End -->

        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            @include('layouts.admin.partials.navbar')
            <!--  Header End -->

            {{-- Start Content --}}
            <div class="container-fluid">
                {{ $slot }}
            </div>
            {{-- End Content --}}

        </div>
    </div>
    <script src="{{ asset('assets/libs/dashboard/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/dashboard/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/app.min.js') }}"></script>
    <script src="{{ asset('assets/libs/dashboard/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/libs/dashboard/js/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/dashboard.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <!-- jQuery first, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>

</html>
