@extends('layouts.barangay')


@section('content')
    <h6 class="mt-4"><i class="fa-solid fa-asterisk me-1"></i>List of Farmers</h6>
    <hr class="mt-0">
    {{-- <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol> --}}
    <div class="container-fluid">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Sex</th>
                    <th>Marital Status</th>
                    <th>Birth Date</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Farm Name</th>
                    <th>Farm Location</th>
                    <th>Farm Size</th>
                    <th>Crop Type</th>
                    <th>Ownership Type</th>
                    <th>Name of Owner</th>
                    <th>Farm Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($farmers as $farmer)
                    <tr>
                        <td>{{ $farmer->id }}</td>
                        <td>{{ $farmer->first_name }}</td>
                        <td>{{ $farmer->last_name }}</td>
                        <td>{{ ucfirst($farmer->sex) }}</td>
                        <td>{{ $farmer->marital_status }}</td>
                        <td>{{ $farmer->birth_date }}</td>
                        <td>{{ $farmer->address }}</td>
                        <td>{{ $farmer->phone_number }}</td>
                        <td>{{ $farmer->email }}</td>
                        <td>{{ $farmer->farm_name }}</td>
                        <td>{{ $farmer->farm_location }}</td>
                        <td>{{ $farmer->farm_size }}</td>
                        <td>{{ $farmer->crop_type }}</td>
                        <td>{{ $farmer->ownership_type }}</td>
                        <td>{{ $farmer->name_of_owner }}</td>
                        <td>{{ $farmer->farm_type }}</td>
                    </tr>
                @endforeach


            </tbody>


        </table>

        <div class="d-flex justify-content-center">
            <nav>
                <ul class="pagination">
                    <li class="page-item {{ $farmers->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $farmers->previousPageUrl() }}" tabindex="-1">Previous</a>
                    </li>
                    @foreach ($farmers->links()->elements[0] as $page => $url)
                        <li class="page-item {{ $page == $farmers->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
                    <li class="page-item {{ $farmers->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $farmers->nextPageUrl() }}">Next</a>
                    </li>
                </ul>
            </nav>
        </div>


    </div>
@endsection
