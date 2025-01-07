@extends('layouts.barangay')

@section('content')
    <h6 class="mt-4"><i class="fa-solid fa-asterisk me-1"></i>List of Farmers</h6>
    <hr class="mt-0">
    <div class="container-fluid">
        <div class="col bg-success-subtle p-2 rounded-2 shadow-sm">
            <table class="table table-bordered mb-0 table-striped" id="farmersTable">
                <thead class="table-secondary">
                    <tr>
                        <th>no.</th>
                        <th>Full Name</th>
                        <th>Sex</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $counter = 1; @endphp

                    @foreach ($crop as $data)
                        <tr class="text-center">
                            <td>{{ $counter++ }}</td>
                            <td class="text-start">{{ $data->first_name }} {{ $data->middle_name }} {{ $data->last_name }}
                                {{ $data->suffix }}
                            </td>
                            <td class="text-uppercase">{{ $data->sex }}</td>
                            <td>{{ $data->phone_number }}</td>

                            <td>
                                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#viewModal">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


@push('scripts')
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <script>
        $(document).ready(function() {
            $('#farmersTable').DataTable({
                responsive: true,
                paging: true,
                ordering: true,
                searching: true,
                columnDefs: [{
                    orderable: false,
                    targets: [4] // Disable sorting on the "Action" column (index 4)
                }]
            });
        });
    </script>
@endpush
