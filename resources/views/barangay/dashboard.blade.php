@extends('layouts.barangay')


@section('content')
    <h6 class="mt-4"><i class="fa-solid fa-asterisk me-1"></i>Dashboard</h6>
    <hr class="mt-0">
    {{-- <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol> --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <small>Total Farmers</small>
                        <h3>20</h3> <!-- Display the total count here -->
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body">
                        <small>News and Update</small>
                        <h3>5</h3> <!-- Display the total count here -->
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <small>Sample</small>
                        <h3>20</h3> <!-- Display the total count here -->
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <small>Sample</small>
                        <h3>20</h3> <!-- Display the total count here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
