<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url('assets/dist/img/background1.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
        .error-message {
            color: red;
            font-size: 14px;
        }
        .btn-custom-color {
            background-color: #FFA500;
            color: #000000;

        }
        .login-heading {
            text-align: center;
            color: #FFA500; /* Same color as the button */
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-6">
            <div class="login-heading">
                Login
            </div>
            <form method="POST" action="{{ route('login') }}" class="bg-white p-4 rounded shadow" id="loginForm">
                @csrf
                @if ($errors->has('email'))
                    <div class="alert alert-danger">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Enter your Email" value="{{ old('email') }}" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Enter your Password" value="{{ old('password') }}" required>
                </div>
                <div class="mb-3">
                    <span>Don't have an account? <a href="{{ route('register') }}">Sign Up</a></span>
                </div>
                <div class="mb-3">
                    <button type="button" class="btn btn-custom-color btn-block" id="signInButton">Login</button>
                </div>
                <div class="mb-3">
                    <a href="{{ url('/') }}">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS and Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
    $(document).ready(function() {
        $('#signInButton').click(function() {
            var email = $('input[name="email"]').val();
            var password = $('input[name="password"]').val();

            // Reset error messages
            $('.error-message').text('');

            if (email === '') {
                $('#emailError').text('Please fill in this field.');
            }
            if (password === '') {
                $('#passwordError').text('Please fill in this field.');
            }

            if (email === '' || password === '') {
                toastr.warning('Please fill in all fields.');
            } else {
                $('#loginForm').submit();
            }
        });
    });
</script>

</body>
</html>
