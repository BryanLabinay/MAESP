@extends('layouts.barangay')
@section('content')
    <h6 class="mt-4"><i class="fa-solid fa-asterisk me-1"></i>List of Farmers</h6>
    <hr class="mt-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <button class="btn btn-sm btn-danger me-1"><i class="fa-solid fa-file-pdf me-1"></i>Generate PDF</button>
                <button class="btn btn-sm btn-success"><i class="fa-solid fa-file-excel me-1"></i>Export Excel</button>
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
            <!-- Pagination links -->
            {{ $farmers->links() }}


            <!-- Modal structure -->

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

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

    <script>
        new DataTable('#myTable', {
            layout: {
                topStart: {
                    pageLength: {
                        menu: [10, 25, 50, 100]
                    }
                },
                topEnd: {
                    search: {
                        placeholder: 'Type search here'
                    }
                },
                bottomEnd: {
                    paging: {
                        buttons: 3
                    }
                }
            },
            language: {
                lengthMenu: " _MENU_ Records per page",
                info: "Showing _START_ to _END_ of _TOTAL_ records",
                infoEmpty: "No records available",
                infoFiltered: "(filtered from _MAX_ total records)",
                search: "Search:",
                paginate: {
                    first: "First",
                    last: "Last",
                    next: "Next",
                    previous: "Previous"
                }
            }
        });
    </script>
@endsection
