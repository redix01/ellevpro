<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }} | Signup</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: rgb(2 28 47);
            color: #ffffff;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Background lines effect (simplified) */
        .background-lines {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('img/banner.jpg') no-repeat;
            background-size: cover; /* Ensure the image covers the entire area */
            opacity: 0.3;
            z-index: 1;
        }

        .container {
            position: relative;
            z-index: 2;
        }

        .slogan {
            font-size: 2.5rem;
            font-weight: lighter;
            line-height: 1.2;
        }

        .slogan .highlight {
            color: #00FF99;
        }

        .icon-img {
            width: 250px;
            height: 250px;
        }

        .slogan-container {
            display: flex;
            align-items: center;
            gap: 20px; /* Space between icon and text */
        }

        .login-form {
            background-color: rgb(3, 32, 55);
            padding: 30px;
            border-radius: 10px;
        }

        .form-control {
            background-color: rgb(2 28 47);
            border: none;
            color: #ffffff;
        }

        .form-control::placeholder {
            color: #A0A0A0;
        }

        .btn-login {
            background-color: #00FF99;
            color: #000000;
            border: none;
            font-weight: bold;
        }

        .btn-login:hover {
            background-color: #00E68A;
        }

        .forgot-password, .register-link {
            color: #00FF99;
            text-decoration: none;
        }

        .forgot-password:hover, .register-link:hover {
            color: #00E68A;
        }
    </style>
</head>
<body>
<div class="background-lines"></div>
<div class="container">
    <div class="row align-items-center">
        <!-- Left Side: Slogan and Icon -->
        <div class="col-lg-7 col-md-12 d-none d-lg-block">
            <div class="slogan-container">
                <img src="{{ asset('img/image.webp') }}" alt="" class="icon-img">
                <h1 class="slogan">
                    Build Your Legacy And<br>
                    Design Your Financial<br>
                    Future For <span class="highlight">Generations.</span>
                </h1>
            </div>
        </div>
        <!-- Right Side: Login Form -->
        <div class="col-md-12 col-lg-5">
            <div class="login-form">
                <h2 class="text-white mb-4 text-center">SIGN UP</h2>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row mb-2">
                        <div class="col-lg-6">
                             <label for="">First Name</label>
                            <input type="text" name="first_name" class="form-control form-control-lg"
                               placeholder="First Name">
                        </div>
                        <div class="col-lg-6">
                             <label for="">Last Name</label>
                            <input type="text" name="last_name" class="form-control form-control-lg"
                               placeholder="Last Name">
                        </div>
                    </div>

                    <div class="col-lg-12 mb-2">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control form-control-lg" placeholder="Username">
                    </div>
                    <div class="col-lg-12 mb-2">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control form-control-lg" placeholder="Last name">
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control form-control-lg"
                                   placeholder="Password">
                        </div>
                        <div class="col-lg-6">
                            <label for="">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control form-control-lg"
                                   placeholder="Confirm Password">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-login w-100 btn-lg">Sign Up</button>
                    <div class="text-center mt-3">
                        <p>Have an Account? <a href="{{ route('login') }}" class="register-link"> Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
