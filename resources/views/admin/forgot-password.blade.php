<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;

            font-family: 'Arial', sans-serif;

            background-color: #7a0443;


        }

        .login-container {
            max-width: 400px;
            padding: 40px;
            border-radius: 15px;
            background-color: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .login-container h3 {
            font-size: 26px;
            margin-bottom: 30px;
            font-weight: 700;
            color: #333;
            text-align: center;
        }

        .login-container .form-label {
            font-weight: 600;
            color: #555;
        }

        .login-container .form-control {
            border-radius: 8px;
            padding: 12px;
            font-size: 16px;
        }

        .login-container .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-size: 18px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .login-container .btn-primary:hover {
            background-color: #0056b3;
        }

        .login-container .alert {
            font-size: 14px;
        }

        .login-container .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
        }
        .btn{
            background-color: #7a0443;
            color: white;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h3>Admin Forgot Password</h3>
    <form method="POST" action="{{ route('admin.password.email') }}">
        @csrf
        <div class="mb-4">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <button type="submit" class="btn  w-100">Send Password Reset Link</button>
    </form>

    @if(session('status'))
        <div class="alert alert-success mt-3">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
