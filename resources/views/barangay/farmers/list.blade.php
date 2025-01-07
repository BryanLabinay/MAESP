@extends('layouts.barangay')
@section('content')
    <h6 class="mt-4"><i class="fa-solid fa-asterisk me-1"></i>List of Farmers</h6>
    <hr class="mt-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <button class="btn btn-sm btn-danger me-1" onclick="window.location='{{ route('farmers.export.pdf') }}'">
                    <i class="fa-solid fa-file-pdf me-1"></i>Generate PDF
                </button>
                <button class="btn btn-sm btn-success" onclick="window.location='{{ route('farmers.export.excel') }}'">
                    <i class="fa-solid fa-file-excel me-1"></i>Export Excel
                </button>
            </div>
        </div>
        <div class="col bg-success-subtle p-2 mt-3 rounded-2 shadow-sm">
            <table class="table table-bordered mb-0 table-striped" id="myTable">
                <thead class="table-secondary">
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Name</th>
                        <th>Sex</th>
                        <th>Contact</th>
                        <th>Date of Birth</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $counter = 1; @endphp
                    @foreach ($farmers as $data)
                        <tr class="text-center">
                            <td>{{ $counter++ }}</td>
                            <td class="text-start">{{ $data->first_name }} {{ $data->middle_name }} {{ $data->last_name }}
                                {{ $data->suffix }}
                            </td>
                            <td class="text-uppercase">{{ $data->sex }}</td>
                            <td>{{ $data->phone_number }}</td>
                            <td>{{ \Carbon\Carbon::parse($data->birth_date)->format('F j, Y') }}</td>
                            <td>{{ $data->address }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#viewModal">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Modal structure -->
            <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewModalLabel">Modal Title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Modal content goes here -->
                            <p>This is the content inside the modal.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include DataTables.js -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true,
                paging: true,
                ordering: true,
                info: true,
                autoWidth: false,
                lengthChange: true,
                pageLength: 5,
                columnDefs: [{
                        orderable: false,
                        targets: [6]
                    } // Make the "Action" column unsortable
                ]
            });
        });
    </script>
@endpush
