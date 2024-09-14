{{--<x-guest-layout>--}}
{{--    <!-- Session Status -->--}}
{{--    <x-auth-session-status class="mb-4" :status="session('status')" />--}}

{{--    <form method="POST" action="{{ route('login') }}">--}}
{{--        @csrf--}}

{{--        <!-- Email Address -->--}}
{{--        <div>--}}
{{--            <x-input-label for="email" :value="__('Email')" />--}}
{{--            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />--}}
{{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Password -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password" :value="__('Password')" />--}}

{{--            <x-text-input id="password" class="block mt-1 w-full"--}}
{{--                            type="password"--}}
{{--                            name="password"--}}
{{--                            required autocomplete="current-password" />--}}

{{--            <x-input-error :messages="$errors->get('password')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Remember Me -->--}}
{{--        <div class="block mt-4">--}}
{{--            <label for="remember_me" class="inline-flex items-center">--}}
{{--                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">--}}
{{--                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>--}}
{{--            </label>--}}
{{--        </div>--}}

{{--        <div class="flex items-center justify-end mt-4">--}}
{{--            @if (Route::has('password.request'))--}}
{{--                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">--}}
{{--                    {{ __('Forgot your password?') }}--}}
{{--                </a>--}}
{{--            @endif--}}

{{--            <x-primary-button class="ms-3">--}}
{{--                {{ __('Log in') }}--}}
{{--            </x-primary-button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</x-guest-layout>--}}
    <!DOCTYPE html>
<!-- Source Codes By CodingNepal - www.codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Form in HTML and CSS | CodingNepal</title>
    <link rel="stylesheet" href="{{ asset('assets/css/stylee.css') }}" />
</head>
<body>
<div class="login_form">
    <!-- Login form container -->
    <form action="#">
        <h3>Log in with</h3>

        <div class="login_option">
            <!-- Google button -->
            <div class="option">
                <a href="#">
                    <img src="logos/google.png" alt="Google" />
                    <span>Google</span>
                </a>
            </div>

            <!-- Apple button -->
            <div class="option">
                <a href="#">
                    <img src="logos/apple.png" alt="Apple" />
                    <span>Apple</span>
                </a>
            </div>
        </div>

        <!-- Login option separator -->
        <p class="separator">
            <span>or</span>
        </p>

        <!-- Email input box -->
        <div class="input_box">
            <label for="email">Email</label>
            <input type="email" id="email" placeholder="Enter email address" required />
        </div>

        <!-- Paswwrod input box -->
        <div class="input_box">
            <div class="password_title">
                <label for="password">Password</label>
                <a href="#">Forgot Password?</a>
            </div>

            <input type="password" id="password" placeholder="Enter your password" required />
        </div>

        <!-- Login button -->
        <button type="submit">Log In</button>

        <p class="sign_up">Don't have an account? <a href="{{route('register')}}">Sign up</a></p>
    </form>
</div>
</body>
</html>
