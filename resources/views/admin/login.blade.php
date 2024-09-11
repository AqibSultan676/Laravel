<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f2f5;
            font-family: 'Arial', sans-serif;
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

        .login-container .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
        }

        .login-container .form-text {
            margin-top: 10px;
            color: #777;
        }

        .btn {
            background-color: #7a0443;
            color: white;
        }

        /* Loading spinner */
        .loading-spinner {
            display: none;
            width: 24px;
            height: 24px;
            border: 3px solid rgba(0, 0, 0, 0.1);
            border-top: 3px solid #007bff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

    </style>
</head>
<body>
    <div class="login-container">
        <h3 style="text-align: center;">Admin Login</h3>
        <!-- Display Flash Message -->
        @if (session('status'))
            <div class="alert alert-success" id="statusMessage">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <!-- Add Forgot Password Link -->
            <div class="mb-4 text-start">
                <a href="#" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal" class="form-text">Forgot Password?</a>
            </div>

            <!-- Centered Button -->
            <div class="text-center">
                <button type="submit" class="btn w-50">Login</button>
            </div>
        </form>

        <div class="form-text mt-3">
            © 2024 Your Company. All Rights Reserved.
        </div>
    </div>

    <!-- Forgot Password Modal -->
    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="forgotPasswordModalLabel">Forgot Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="forgotPasswordForm" method="POST" action="{{ route('admin.password.email') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="reset-email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="reset-email" name="email" placeholder="Enter your email" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Send Password Reset Link</button>
                        <!-- Loading spinner -->
                        <div class="loading-spinner mt-3" id="loadingSpinner"></div>
                    </form>
                    <div id="resetMessage" class="mt-3"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>


        // Handle Forgot Password form submission
        document.getElementById('forgotPasswordForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const form = this;
            const formData = new FormData(form);
            const resetMessage = document.getElementById('resetMessage');
            const loadingSpinner = document.getElementById('loadingSpinner');

            // Show loading spinner
            loadingSpinner.style.display = 'block';

            fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': formData.get('_token')
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Hide loading spinner
                loadingSpinner.style.display = 'none';

                if (data.message) {
                    resetMessage.textContent = data.message;
                    resetMessage.classList.add('alert', 'alert-success');
                    form.reset(); // Reset the form fields after successful submission
                } else {
                    resetMessage.textContent = 'Something went wrong.';
                    resetMessage.classList.add('alert', 'alert-danger');
                }
            })
            .catch(error => {
                // Hide loading spinner
                loadingSpinner.style.display = 'none';

                resetMessage.textContent = 'An error occurred.';
                resetMessage.classList.add('alert', 'alert-danger');
            });
        });
    </script>

</body>
</html>
