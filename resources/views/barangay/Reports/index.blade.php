@extends('layouts.barangay')

@section('content')
    <h6 class="mt-4"><i class="fa-solid fa-asterisk me-1"></i>Reports</h6>
    <hr class="mt-0">
    <div class="container-fluid py-4">
        <!-- Header with Create Report Button -->
        <div class="d-flex justify-content-end align-items-center mb-4">
            {{--  <h2 class="text-primary">Reports Management</h2>  --}}
            <!-- Button to Trigger Modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createReportModal">
                <i class="bi bi-plus-circle"></i> Create Report
            </button>

        </div>

        <!-- Reports Table -->
        <div class="table-responsive shadow-sm rounded p-3 border">
            <table class="table table-hover table-bordered table-striped align-middle" id="myTable">
                <thead class="table-success text-center">
                    <tr>
                        <th class="text-nowrap">ID</th>
                        <th class="text-nowrap">Title</th>
                        <th class="text-nowrap">Description</th>
                        <th class="text-nowrap">File</th>
                        <th class="text-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                        <tr>
                            <td class="text-center">{{ $report->id }}</td>
                            <td>{{ $report->title }}</td>
                            <td>{{ $report->description }}</td>
                            <td>
                                <a href="{{ asset('media/reports/' . $report->file) }}" target="_blank"
                                    class="text-decoration-none">
                                    <i class="bi bi-file-earmark-text-fill"></i> {{ $report->file }}
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('send-reports.edit', $report->id) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('send-reports.destroy', $report->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash-fill"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="createReportModal" tabindex="-1" aria-labelledby="createReportModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="createReportModalLabel">Create New Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{ route('send-reports.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">File</label>
                            <input type="file" class="form-control" id="file" name="file" required>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2">Create</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
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
                pageLength: 10,
                columnDefs: [{
                        orderable: false,
                        targets: [4]
                    } // Make the "Action" column unsortable
                ]
            });
        });
    </script>
@endpush
