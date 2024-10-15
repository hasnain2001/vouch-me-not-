<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
         <link rel="icon" href="{{ asset('images/icons.png') }}" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('images/pexels-ioanamtc-9634190.jpg');
            background-size: cover; /* Makes sure the background covers the entire page */
            background-position: center; /* Centers the background image */
            background-repeat: no-repeat; /* Ensures the background does not repeat */
            background-attachment: fixed; /* Makes the background fixed on scroll */
        }
        .login-form {
            max-width: 360px;
            padding: 15px;
            border: 1px solid #dee2e6;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .login-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-label {
            font-weight: bold;
        }
        .form-control {
            margin-bottom: 15px;
        }
        .btn-login {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            border-radius: 3px;
        }
        .btn-login:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center h-100">
  <div class="card shadow rounded p-4 login-form" style="max-width: 400px;"> <h2> Admin Login</h2>
    <form method="POST" action="{{ route('admin.login') }}">
      @csrf

      <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" required autocomplete="email" autofocus>
        @error('email')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>

      <div class="mb-3 password-field">
        <label for="password" class="form-label">Password</label>
        <div class="input-group">
          <input id="password" type="password" name="password" class="form-control" required autocomplete="current-password">
          <div class="input-group-append">
            <button id="togglePassword" class="btn btn-outline-secondary" type="button">
              <i id="password-icon" class="fas fa-eye-slash">show</i>
            </button>
          </div>
        </div>
        @error('password')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>

      <div class="mb-3 form-check">
        <input type="checkbox" name="remember" id="remember" class="form-check-input">
        <label for="remember" class="form-check-label">Remember Me</label>
      </div>
      <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary">Login</button>
                    {{-- <a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a> --}}
                </div>
    </form>
  </div>
</div>

<script>
    // Toggle password visibility
const togglePassword = document.getElementById('togglePassword');
const passwordInput = document.getElementById('password');
const passwordIcon = document.getElementById('password-icon');

togglePassword.addEventListener('click', function() {
  const type = passwordInput.type === 'password' ? 'text' : 'password';
  passwordInput.setAttribute('type', type);

  passwordIcon.classList.toggle('fa-eye-slash'); // Toggle icon class
  passwordIcon.classList.toggle('fa-eye'); // Add alternative icon class
});

</script>
</body>
</html>
