<!DOCTYPE html>
<html>
<head>
    <title>New User Registration</title>
    <style>
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>New User Registration</h1>
    <p>Username: {{ $username }}</p>
    <p>Email: {{ $email }}</p>
    <p>Please review and approve or reject the registration.</p>
    <a href="{{ route('admin.users.index', ['user' => $userId]) }}" class="button">View User Management</a>
</body>
</html>
