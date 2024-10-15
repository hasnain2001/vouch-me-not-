<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('images/pexels-rachel-claire-4993283.jpg');
            background-size: cover; /* Makes sure the background covers the entire page */
            background-position: center; /* Centers the background image */
            background-repeat: no-repeat; /* Ensures the background does not repeat */
            background-attachment: fixed; /* Makes the background fixed on scroll */
        }

        .password-toggle {
            cursor: pointer;
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }

        .card {
            background-color: rgba(255, 255, 255, 0.9); /* Adds some transparency to the card */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center bg-primary text-white">
                        <h3> Admin Sign up </h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.register') }}">
                            @csrf

                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                                @if ($errors->has('name'))
                                    <div class="text-danger mt-2">{{ $errors->first('name') }}</div>
                                @endif
                            </div>

                            <!-- Email Address -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                                @if ($errors->has('email'))
                                    <div class="text-danger mt-2">{{ $errors->first('email') }}</div>
                                @endif
                            </div>

                            <!-- Password -->
                            <div class="mb-3 position-relative">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
                                <span class="password-toggle" onclick="togglePassword('password')">Show</span>
                                @if ($errors->has('password'))
                                    <div class="text-danger mt-2">{{ $errors->first('password') }}</div>
                                @endif
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-3 position-relative">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                                <span class="password-toggle" onclick="togglePassword('password_confirmation')">Show</span>
                                @if ($errors->has('password_confirmation'))
                                    <div class="text-danger mt-2">{{ $errors->first('password_confirmation') }}</div>
                                @endif
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <a class="btn btn-link" href="{{ route('login') }}">Already registered?</a>
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(id) {
            const passwordInput = document.getElementById(id);
            const toggleText = passwordInput.nextElementSibling;

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleText.textContent = "Hide";
            } else {
                passwordInput.type = "password";
                toggleText.textContent = "Show";
            }
        }
    </script>
</body>
</html>
