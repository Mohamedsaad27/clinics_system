<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic System Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom right, #e6f2ff, #ffffff);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            max-width: 400px;
            width: 100%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .medical-icon {
            font-size: 1.5rem;
            color: #0d6efd;
        }
        .login-image {
            max-width: 150px;
            margin: 0 auto 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body ml-5">
                        <h2 class="card-title text-center mb-4">Clinic System Login</h2>
                        <img src="{{asset('3_Telehealth-Solutions-1024x640.jpg')}}" alt="Doctor illustration" class="rounded-circle d-block login-image">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" value="{{old('email')}}" class="form-control" name="email" id="email" placeholder="doctor@clinic.com" required>
                                @if ($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email') }}
                                </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" value="{{old('password')}}" class="form-control" name="password" id="password" required>
                                @if ($errors->has('password'))
                                <div class="text-danger">
                                    {{ $errors->first('password') }}
                                </div>
                                @endif
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember this device</label>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Sign In</button>
                        </form>
                        <div class="text-center mt-3">
                            <a href="#" class="text-decoration-none">Forgot Password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="position-fixed bottom-0 start-0 p-3">
        <i class="bi bi-globe medical-icon"></i>
        <i class="bi bi-geo-alt medical-icon ms-2"></i>
        <i class="bi bi-telephone medical-icon ms-2"></i>
    </div>

    <div class="position-fixed top-0 end-0 p-3">
        <i class="bi bi-shield-plus medical-icon"></i>
        <i class="bi bi-thermometer-half medical-icon ms-2"></i>
        <i class="bi bi-heart-pulse medical-icon ms-2"></i>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
</body>
</html>