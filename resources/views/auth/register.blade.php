<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .error-message {
            color: red;
            font-size: 14px;
        }
        .btn-custom-color {
        background-color: #FFC0BC; /* Set the background color for the button */
        color: #000000; /* Set the border color for the button */
        }
        .register-heading {
            text-align: center;
            color: #AA336A; /* Same color as the button */
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
            <div class="register-heading">
                Sign Up
            </div>
            <form method="POST" action="{{ route('register') }}" class="form-container" id="registerForm">
                @csrf
                <div class="mb-3">
                    <input type="name" class="form-control" placeholder="Full Name" id="name" name="name"  required>
                    <span class="error-message" id="nameError"></span>
                </div>
                <div class="mb-3">
                    <input type="username" class="form-control" placeholder="Username" id="username" name="username"  required>
                    <span class="error-message" id="usernameError"></span>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email" id="email" name="email"  required>
                    <span class="error-message" id="emailError"></span>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
                    <span class="error-message" id="passwordError"></span>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Confirm Password" id="password_confirmation" name="password_confirmation" required>
                    <span class="error-message" id="confirmPasswordError"></span>
                </div>
                <div class="mb-3 text-center">
                    <span>Already have an account? <a href="{{ route('login') }}">Login</a></span>
                </div>
                <div class="mb-3">
                    <button type="button" class="btn btn-custom-color btn-block" id="registerButton">Sign Up</button>
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
        $('#registerButton').click(function() {
            var name = $('#name').val();
            var username = $('#username').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var confirmPassword = $('#password_confirmation').val();

            // Reset error messages
            $('.error-message').text('');

            if (name === '') {
                $('#nameError').text('Please fill in this field.');
            }
            if (username === '') {
                $('#usernameError').text('Please fill in this field.');
            }
            if (email === '') {
                $('#emailError').text('Please fill in this field.');
            }
            if (password === '') {
                $('#passwordError').text('Please fill in this field.');
            }
            if (confirmPassword === '') {
                $('#confirmPasswordError').text('Please fill in this field.');
            }

            if (name === '' || username === '' || email === '' || password === '' || confirmPassword === '') {
                toastr.warning('Please fill in all fields.');
            } else {
                $('#registerForm').submit();
            }
        });
    });
</script>

</body>
</html>
