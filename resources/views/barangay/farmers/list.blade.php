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
        {{--  <hr class="mt-2">  --}}
        <div class="col p-4 rounded-lg shadow-sm bg-light border mt-2 overflow-hidden">
            <table class="table table-bordered mb-0 table-striped table-hover" id="myTable">
                <thead class="table-success">
                    <tr class="text-center">
                        <th class="text-sm">No.</th>
                        <th class="text-sm">Name</th>
                        <th class="text-sm">Sex</th>
                        <th class="text-sm">Contact</th>
                        <th class="text-sm text-center">Address</th>
                        <th class="text-sm text-center">Status</th>
                        <th class="text-sm">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $counter = 1; @endphp
                    @foreach ($farmers as $data)
                        <tr class="text-center text-gray-700 hover:bg-gray-50 transition duration-200">
                            <td class="">{{ $counter++ }}</td>
                            <td class="text-start ">{{ $data->first_name }} {{ $data->middle_name }}
                                {{ $data->last_name }}
                                {{ $data->suffix }}
                            </td>
                            <td class="text-uppercase ">{{ $data->sex }}</td>
                            <td class="">{{ $data->phone_number }}</td>
                            <td class="">{{ $data->address }}</td>
                            <td class="">
                                @if($data->status == 'active')
                                    <p style="color: limegreen">Active</p>
                                @elseif($data->status == 'inactive')
                                    <p style="color: red">Inactive</p>
                                @endif
                            </td>

                            <td>
                                <a href="#"
                                   class="btn btn-sm btn-primary hover:bg-blue-600 transition duration-200"
                                   data-bs-toggle="modal"
                                   data-bs-target="#viewModal-{{ $data->id }}">
                                   View
                                </a>

                                @if($data->status == 'active')
                                    <a href="{{ route('status.update', ['id' => $data->id, 'status' => 'inactive']) }}" class="btn btn-sm btn-danger" style="width: 100px">Deactivate</a>
                                @elseif($data->status == 'inactive')
                                    <a href="{{ route('status.update', ['id' => $data->id, 'status' => 'active']) }}" class="btn btn-sm btn-success" style="width: 100px">Activate</a>
                                @endif
                            </td>



                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @foreach ($farmers as $data)
    <div class="modal fade" id="viewModal-{{ $data->id }}" tabindex="-1" aria-labelledby="viewModalLabel-{{ $data->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel-{{ $data->id }}">Farmer Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Name:</strong> {{ $data->first_name }} {{ $data->middle_name }} {{ $data->last_name }} {{ $data->suffix }}</p>
                    <p><strong>Sex:</strong> {{ $data->sex }}</p>
                    <p><strong>Contact:</strong> {{ $data->phone_number }}</p>
                    <p><strong>Address:</strong> {{ $data->address }}</p>
                </div>
                <div class="modal-footer">
                    <a type="button" href="{{ route('edit.farmers',$data->id) }}" class="btn btn-primary">Edit</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach


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
                pageLength: 10,
                columnDefs: [{
                        orderable: false,
                        targets: [5]
                    }
                ]
            });
        });
    </script>
@endpush
