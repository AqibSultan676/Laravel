<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @stack('response_index_style')
    @stack('responsestyle')
    @stack('users_css')
   <style>
        /* Custom styles for dashboard */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .wrapper {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            min-height: 100vh;
            padding-top: 20px;
            transition: all 0.3s;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 15px 20px;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .sidebar a.active {
            background-color: #007bff;
        }
        .sidebar .sidebar-heading {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.25rem;
            color: #ffffff;
        }
        .main-content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }
        .btn-logout {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #ffffff;
            width: 100%;
        }
        .btn-logout:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .fa-users{
                   color: #049cba
        }
        .fa-box{
            color: yellowgreen
        }
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                top: 0;
                left: -250px;
                width: 100%;
                height: 100%;
                z-index: 1050;
            }
            .sidebar.show {
                left: 0;
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar for mobile -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark d-md-none">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Admin Panel</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.users.index') }}"><i class="fas fa-users"></i> User Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.responses') }}"><i class="fas fa-box"></i> Response</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('admin.logout') }}" method="POST" class="nav-link">
                        @csrf
                        <button type="submit" class="btn btn-logout w-100">
                            Logout <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="wrapper">
        <!-- Sidebar for desktop -->
        <div class="sidebar d-none d-md-block">
            <div class="sidebar-heading">Admin Panel</div>
            <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="{{ route('admin.users.index') }}"><i class="fas fa-users active "></i> User Management</a>
            <a href="{{ route('admin.responses') }}"><i class="fas fa-box"></i> Responses</a>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-logout mt-4">Logout <i class="fas fa-sign-out-alt"></i></button>
            </form>
        </div>

        <!-- Main content -->
        <div class="main-content">
            @yield('content')
            @yield('response')
            @yield('show')
        </div>
    </div>

    <!-- Bootstrap 5 JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
