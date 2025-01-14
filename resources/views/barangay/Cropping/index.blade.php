@extends('layouts.barangay')

@section('content')
    <h6 class="mt-4"><i class="fa-solid fa-asterisk me-1"></i>Cropping Assessment</h6>
    <hr class="mt-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <button class="btn btn-sm btn-danger me-1" onclick="window.location='{{ route('cropping.pdf') }}'">
                    <i class="fa-solid fa-file-pdf me-1"></i>Generate PDF
                </button>
                <button class="btn btn-sm btn-success" onclick="window.location='{{ route('cropping.excel') }}'">
                    <i class="fa-solid fa-file-excel me-1"></i>Export Excel
                </button>
            </div>
        </div>
        <div class="col bg-light mt-2 border p-2 rounded-2 shadow-sm">
            <table class="table table-bordered mb-0 table-striped table-hover" id="myTable">
                <thead class="table-success">
                    <tr>
                        <th>No.</th>
                        <th>Full Name</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $counter = 1; @endphp

                    @foreach ($crop as $data)
                        <tr class="text-center">
                            <td>{{ $counter++ }}</td>
                            <td class="text-start">{{ $data->first_name }} {{ $data->middle_name }} {{ $data->last_name }} {{ $data->suffix }}</td>
                            <td class="text-uppercase">{{ $data->address }}</td>
                            <td>{{ $data->phone_number }}</td>

                            <td>

                                <a href="{{ route('view.cropping', $data->id) }}" class="btn btn-primary">View</a>
                            </td>
                        </tr>



                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
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
                pageLength: 10,
                columnDefs: [{
                        orderable: false,
                        targets: [4]
                    }
                ]
            });
        });
    </script>

@endpush

