<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Sistem Pakar</title>
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-KLgNEZBvR6l9b26v01zLOFAJw2Zb3vi6ea6KbCTbp3gHflU/xM47O5U1/ZlUP+6Ls5Evf/xFmeTIlYkFx9M6g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            background-image: url('landing/img/full-1.jpg');
            background-size: cover;
            background-position: center;
            font-family: 'Lato', sans-serif;
        }

        .login-card {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 400px;
            margin: 100px auto;
            animation: fadeInDown 1s;
        }

        .login-card h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 20px;
            background-color: rgba(0, 0, 0, 0.1);
            border: none
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #ddd;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-check {
            margin-bottom: 20px;
        }

        .btn {
            border-radius: 20px;
            background-color: #009244;
            color: white;
            font-size: 18px;
            padding: 12px 30px;
            border: none;
        }

        .btn:hover {
            background-color: #036c26;
        }

        .eye-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>

</head>

<body>
    @php
        use Illuminate\Support\Facades\Session;
    @endphp

    <div class="login-card animate__animated animate__fadeInDown">
        <div class="logo"></div>
        <div style="text-align: center;">
            <img src="landing/img/logo-es.png" alt="Logo" style="width: 215px; height: 55px;">
        </div>
        <br>
        <br>
        <h1 style="font-size: 1.5rem;
    font-weight: bold;
    text-align: center;
    text-decoration: underlined;">User Login</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        placeholder="Masukkan email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="form-group" style="white-space: nowrap; position: relative;">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password" placeholder="Password">

                <!-- Eye icon to show/hide password -->
                <span class="eye-icon" onclick="togglePasswordVisibility()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-1.63 0-3.13-.52-4.38-1.38l-.1-.1c-1.13-1.13-1.77-2.64-1.77-4.26s.64-3.13 1.77-4.26c1.13-1.13 2.64-1.77 4.26-1.77s3.13.64 4.26 1.77c1.13 1.13 1.77 2.64 1.77 4.26s-.64 3.13-1.77 4.26c-1.13 1.13-2.64 1.77-4.26 1.77zm0-3c1.34 0 2.61-.26 3.81-.72.25-.12.53-.11.77.03.21.13.36.32.43.55.06.24.01.49-.13.7-.47.81-1.24 1.45-2.19 1.89-1.42.64-3.07.91-4.89.91s-3.47-.27-4.89-.91c-.95-.44-1.72-1.08-2.19-1.89-.12-.21-.19-.45-.19-.7s.07-.49.19-.7c.47-.81 1.24-1.45 2.19-1.89.73-.31 1.53-.51 2.4-.61l1.11-.2 1.46-.26 1.26-.23.53-.1.1-.03c.43-.09.88-.14 1.34-.14zm-.34-6.66c-.2-.2-.51-.2-.71 0l-6.12 6.12c-.2.2-.2.51 0 .71s.51.2.71 0l6.12-6.12c.2-.2.2-.51 0-.71zm-1.43-.98l-1.41 1.41c-.2.2-.2.51 0 .71s.51.2.71 0l1.41-1.41c.2-.2.2-.51 0-.71s-.51-.2-.71 0zM12 15c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z" />
                    </svg>
                </span>

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>


            <button type="submit" class="btn btn-primary btn-block">Log In</button>
        </form>
    </div>
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('password');
            var eyeIcon = document.querySelector('.eye-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML =
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 15c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm0-3c-.83 0-1.5.67-1.5 1.5s.67 1.5 1.5 1.5 1.5-.67 1.5-1.5-.67-1.5-1.5-1.5zm0-8c-4.97 0-9 4.03-9 9s4.03 9 9 9 9-4.03 9-9-4.03-9-9-9zm0 16c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm0-15.1c-3.86 0-7 3.14-7 7s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7zM13.5 6.5c.83 0 1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5-1.5.67-1.5 1.5.67 1.5 1.5 1.5z"/></svg>';
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML =
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-1.63 0-3.13-.52-4.38-1.38l-.1-.1c-1.13-1.13-1.77-2.64-1.77-4.26s.64-3.13 1.77-4.26c1.13-1.13 2.64-1.77 4.26-1.77s3.13.64 4.26 1.77c1.13 1.13 1.77 2.64 1.77 4.26s-.64 3.13-1.77 4.26c-1.13 1.13-2.64 1.77-4.26 1.77zm0-3c1.34 0 2.61-.26 3.81-.72.25-.12.53-.11.77.03.21.13.36.32.43.55.06.24.01.49-.13.7-.47.81-1.24 1.45-2.19 1.89-1.42.64-3.07.91-4.89.91s-3.47-.27-4.89-.91c-.95-.44-1.72-1.08-2.19-1.89-.12-.21-.19-.45-.19-.7s.07-.49.19-.7c.47-.81 1.24-1.45 2.19-1.89.73-.31 1.53-.51 2.4-.61l1.11-.2 1.46-.26 1.26-.23.53-.1.1-.03c.43-.09.88-.14 1.34-.14zm-.34-6.66c-.2-.2-.51-.2-.71 0l-6.12 6.12c-.2.20-.2.51 0 .71s.51.2.71 0l6.12-6.12c.2-.20.2-.51 0-.71zm-1.43-.98l-1.41 1.41c-.20.20-.20.51 0 .71s.51.20.71 0l1.41-1.41c.20-.20.20-.51 0-.71s-.51-.20-.71 0zM12 15c-1.10 0-2-.90-2-2s.90-2 2-2 2 .90 2 2-.90 2-2 2z"/></svg>';
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="
