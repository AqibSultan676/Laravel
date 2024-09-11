<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users Management</title>
    @push('users_css')
    <style>
        body {
            background-color: #d40658;
        }

        .card {
            background-color: #f8f9fa; /* Light background color for the card */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow effect for the card */
            border: none;
            border-radius: 0.50rem; /* Rounded corners */
            margin-bottom: 1rem; /* Space between cards */
        }

        .card-header {
            background-color: #343a40; /* Dark background color for the header */
            color: #ffffff; /* White text color for the header */
            font-weight: bold;
            font-size: 1.2em;
            border-bottom: 1px solid #dee2e6; /* Border under the header */
        }

        .card-body {
            padding: 1.5rem;
        }

        .badge-success {
            background-color: #28a745;
            color: white;
        }

        .badge-danger {
            background-color: #dc3545;
            color: white;
        }

        .badge-warning {
            background-color: #ffc107;
            color: black;
        }

        .table {
            margin-bottom: 0; /* Remove bottom margin from the table inside card */
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table th, .table td {
            padding: 0.75rem;
            vertical-align: middle;
        }

        .btn-sm {
            font-size: 0.875rem; /* Smaller button text */
        }

        .table-responsive {
            overflow-x: auto; /* Allow horizontal scroll on very small screens */
        }

        .table thead {
            background-color: #d40658; /* Table header background color */
            color: #ffffff; /* White text color */
        }

        .btn-approve, .btn-reject, .btn-delete {
            margin-right: 5px; /* Add some space between buttons */
        }

        /* Responsive adjustments for small screens */
        @media (max-width: 576px) {
            .card-body {
                padding: 1rem; /* Reduced padding for smaller screens */
            }

            .table th, .table td {
                font-size: 0.875rem; /* Smaller text size */
            }
        }
    </style>
    @endpush
</head>
<body>
    @extends('admin.dashboard')

    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4"> <!-- Full width of the container -->
                <div class="card">
                    <div class="card-header text-center">
                        <h2>User Management</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $user)
                                        <tr>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if($user->is_approved === 1)
                                                    <span class="badge badge-success">Approved</span>
                                                @elseif($user->is_approved === 0)
                                                    <span class="badge badge-danger">Rejected</span>
                                                @else
                                                    <span class="badge badge-warning">Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($user->is_approved !== 1) <!-- Show Approve/Reject buttons only if not approved -->
                                                    <form action="{{ route('admin.users.approve', $user->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success btn-sm btn-approve">
                                                            <i class="fas fa-check-circle"></i> Approve
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('admin.users.reject', $user->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm btn-reject">
                                                            <i class="fas fa-times-circle"></i> Reject
                                                        </button>
                                                    </form>
                                                @endif
                                                <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-warning btn-sm btn-delete" onclick="return confirm('Are you sure you want to delete this user?');">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No users available.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

</body>
</html>
