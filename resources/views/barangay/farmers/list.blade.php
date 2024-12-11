@extends('layouts.barangay')

@section('css')
    {{-- Data Table --}}
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.7.1.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/js/dataTables.js">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js">
@endsection

@section('content')
    <h6 class="mt-4"><i class="fa-solid fa-asterisk me-1"></i>List of Farmers</h6>
    <hr class="mt-0">
    <div class="container-fluid">
        <div class="col bg-success-subtle p-2 rounded-2 shadow-sm">
            <table class="table table-bordered mb-0 table-striped" id="myTable">
                <thead class="table-secondary">
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        {{-- <th>Sex</th> --}}
                        {{-- <th>Marital Status</th> --}}
                        {{-- <th>Birth Date</th> --}}
                        {{-- <th>Address</th> --}}
                        <th>Phone Number</th>
                        {{-- <th>Email</th> --}}

                        <th>Farm Location</th>
                        <th>Farm Size</th>
                        <th>Farm Type</th>
                        <th>Crop Commodity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($farmers as $farmer)
                        {{-- Farmer's Name --}}
                        <tr>
                            <td rowspan="{{ count($farmer->parcels) }}">{{ $farmer->id }} </td>
                            <!-- Name spans multiple rows -->
                            <td rowspan="{{ count($farmer->parcels) }}">{{ $farmer->first_name }} </td>
                            <td rowspan="{{ count($farmer->parcels) }}">{{ $farmer->last_name }}</td>
                            <td rowspan="{{ count($farmer->parcels) }}">{{ $farmer->phone_number }}</td>


                            {{-- Loop over each parcel --}}
                            @foreach ($farmer->parcels as $index => $parcel)
                                @if ($index > 0)
                        <tr>
                            <!-- Start a new row for subsequent parcels -->
                    @endif

                    {{-- Farm Location, Area, Type, and Crop --}}
                    <td>{{ $index + 1 }}. {{ $parcel['farm_location'] }}</td>
                    <td>{{ $parcel['farm_area'] }}</td>
                    <td>{{ $parcel['farm_type'] }}</td>
                    <td>{{ $parcel['crop_commodity'] }}</td>

                    @if ($index > 0)
                        </tr> <!-- Close the row for subsequent parcels -->
                    @endif
                    @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>


            <!-- Pagination links -->
            {{ $farmers->links() }}
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
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
