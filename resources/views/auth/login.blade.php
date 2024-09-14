<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Management Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f7f7;
        }
        .login-container {
            margin-top: 100px;
        }
        .login-form {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }
        .login-form img {
            max-width: 100%;
            height: auto;
        }
        .login-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-login {
            width: 100%;
        }
    </style>
</head>
<body>

<div class="container login-container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="login-form">
                <img src="{{asset('assets/Clinic-Management-System_-Way-to-Digital-Healthcare.jpg')}}" alt="Clinic Management">
                <h2>Clinic Management Login</h2>
                <form  method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}"  placeholder="Enter email">
                        @if ($errors->has('email'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error:</strong> {{ $errors->first('email') }}
                                </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}"  placeholder="Password">
                        @if ($errors->has('password'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error:</strong> {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary btn-login">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
