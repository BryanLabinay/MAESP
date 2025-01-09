@extends('layouts.barangay')

@section('content')
    <h6 class="mt-4"><i class="fa-solid fa-asterisk me-1"></i>Cropping Assessment: {{ $view->first_name }} {{ $view->middle_name }} {{ $view->last_name }} {{ $view->suffix }}</h6>
    <hr class="mt-0">
    <div class="container-fluid">
        <!-- Farmer Details Card -->
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ $view->first_name }} {{ $view->middle_name }} {{ $view->last_name }} {{ $view->suffix }}</h5>
                        <p class="card-text"><strong>Address:</strong> {{ $view->address }}</p>
                        <p class="card-text"><strong>Phone Number:</strong> {{ $view->phone_number }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Parcels Section -->
        <div class="row">
            @foreach ($view->parcels as $index => $parcel)
                <div class="col-md-6 mb-4"> <!-- 2 items per row (col-6) -->
                    <div class="card shadow-sm border-light">
                        <div class="card-body">
                            <h5 class="card-title text-success">Parcel #{{ $index + 1 }}</h5>
                            <hr>
                            <p><strong>Farm Location:</strong> {{ $parcel['farm_location'] }}</p>
                            <p><strong>Variety:</strong> {{ $parcel['variety'] }}</p>
                            <p><strong>Farm Type:</strong> {{ $parcel['farm_type'] }}</p>
                            <p><strong>Area (Hectares):</strong> {{ $parcel['area'] }}</p>
                            <p><strong>Sowing Date:</strong> {{ $parcel['sowing_date'] }}</p>
                            <p><strong>Transplanting Date:</strong> {{ $parcel['transplanting_date'] }}</p>
                            <p><strong>Date Harvested:</strong> {{ $parcel['date_harvested'] }}</p>
                            <p><strong>Gross Yield:</strong> {{ $parcel['gross'] }}</p>
                            <p><strong>Average Yield:</strong> {{ $parcel['average'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Edit Button -->
        <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('edit.cropping', $view->id) }}" class="btn btn-primary px-4">Edit Cropping Assessment</a>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endpush
