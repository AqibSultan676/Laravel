<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #7a0443;
            font-family: 'Arial', sans-serif;
        }

        .reset-container {
            max-width: 400px;
            padding: 40px;
            border-radius: 15px;
            background-color: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .reset-container h3 {
            font-size: 26px;
            margin-bottom: 30px;
            font-weight: 700;
            color: #333;
        }

        .reset-container .form-label {
            font-weight: 600;
            color: #555;
        }

        .reset-container .form-control {
            border-radius: 8px;
            padding: 12px;
            font-size: 16px;
        }

        .reset-container .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-size: 18px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .reset-container .btn-primary:hover {
            background-color: #0056b3;
        }

        .reset-container .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
        }

        .reset-container .form-text {
            margin-top: 10px;
            color: #777;
        }

        .btn {
            background-color: #7a0443;
            color: white;
        }
    </style>
</head>
<body>
    <div class="reset-container">
        <h3 style="text-align: center;"> Admin Reset Password</h3>
        <form method="POST" action="{{ route('admin.password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="mb-4">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">New Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn  w-100">Reset Password</button>
        </form>
    </div>
</body>
</html>
