<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Response for {{ $user->username }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @push('responsestyle')
    <style>



        body{
            background-color: #d40658;
        }
        .card {
            background-color: #f8f9fa; /* Light background color for the card */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow effect for the card */
            border: none;
            border-radius: 0.50rem; /* Rounded corners */
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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #dee2e6;
        }

        th, td {
            padding: 0.75rem;
            text-align: left;
        }

        th {
            color: white;

        }

        img {
            max-width: 100px; /* Adjust the size as needed */
            height: auto;
            cursor: pointer; /* Change cursor to pointer to indicate it's clickable */
        }

        /* Hover effect on table rows */
        .table-hover tbody tr:hover {
            background-color: #e9ecef; /* Light gray background on hover */
            cursor: pointer; /* Change cursor to pointer on hover */
        }

        /* Responsive table */
        .table-responsive {
            overflow-x: auto; /* Allow horizontal scroll on very small screens */
        }

    </style>
    @endpush
</head>
<body>
    @extends('admin.dashboard')
    @section('show')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header text-center">
                Response from {{ $user->username }}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead style="background-color: #d40658; border-radius:4rem;">
                            <tr>
                                <th>Zone</th>
                                <th>Facility Name</th>
                                <th>Item Name</th>
                                <th>Condition</th>
                                <th>Image</th>
                                <th>Comments</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($zoneFacilities as $facility)
                                <tr>
                                    <td>{{ $facility->zone }}</td>
                                    <td>{{ $facility->facility_name }}</td>
                                    <td>{{ $facility->item_name }}</td>
                                    <td>{{ $facility->condition }}</td>
                                    <td>
                                        @if($facility->image_url)
                                            <img src="{{ $facility->image_url }}" alt="{{ $facility->item_name }}" data-toggle="modal" data-target="#imageModal" onclick="setModalImage('{{ $facility->image_url }}')">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>{{ $facility->comments }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="modalImage" src="" class="img-fluid" alt="Image Preview">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <script>
        function setModalImage(imageUrl) {
            document.getElementById('modalImage').src = imageUrl;
        }
    </script>

</body>
</html>
