@extends('layouts.barangay')

@section('content')
    <h6 class="mt-4"><i class="fa-solid fa-asterisk me-1"></i>List of Farmers</h6>
    <hr class="mt-0">
    <div class="container-fluid">
        <div class="col bg-success-subtle p-2 rounded-2 shadow-sm">
            <table class="table table-bordered mb-0 table-striped">
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
