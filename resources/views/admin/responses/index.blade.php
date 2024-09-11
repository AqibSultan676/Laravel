<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Responses</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome -->
    @push('response_index_style')


    <style>

        body {
            background-color: #d40658; /* Background color for the body */
        }

        .container {
            margin-top: 30px;
        }

        .card {
            border: none;
            border-radius: 0.5rem; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        .card-header {
            background-color: #060606; /* Header background color */
            color: #ffffff; /* White text color */
            font-weight: bold;
            font-size: 1.2em;
            border-bottom: 1px solid #dee2e6; /* Border under the header */
        }

        .table th, .table td {
            padding: 0.75rem;
            vertical-align: middle;
        }

        .table thead {
            background-color: #d40658; /* Table header background color */
            color: #ffffff; /* White text color */
        }

        .table-hover tbody tr:hover {
            background-color: #e9ecef; /* Light gray background on hover */
        }

        .btn-custom {
            font-size: 1.2em;
            padding: 0.5rem 1rem;
            margin: 0 0.25rem; /* Horizontal spacing */
        }

        /* Responsive styling */
        @media (max-width: 767px) {
            .table-responsive {
                overflow-x: auto; /* Allow horizontal scroll on very small screens */
            }
        }

</style>
@endpush
</head>
<body>
    @extends('admin.dashboard')
@section('response')
<div class="container">
    <div class="card">
        <div class="card-header text-center bg-black">
            User Responses
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if($users->isEmpty())
                    <p class="text-center">No data available.</p>
                @else
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>Username</th>
                                <th>Submitted At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                @php
                                    $latestZoneFacility = $user->zoneFacilities->first();
                                @endphp
                                <tr class="text-center">
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $latestZoneFacility ? $latestZoneFacility->created_at->format('Y-m-d H:i:s') : 'N/A' }}</td>
                                    <td>
                                        <!-- View Responses Button -->
                                        <a href="{{ route('admin.responses.show', $user->id) }}" class="btn btn-primary btn-custom">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <!-- Delete Button (Only delete ZoneFacility records) -->
                                        <form action="{{ route('admin.responses.deleteFacilities', $user->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-custom" onclick="return confirm('Are you sure you want to delete the related facilities for this user?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

</body>
</html>
