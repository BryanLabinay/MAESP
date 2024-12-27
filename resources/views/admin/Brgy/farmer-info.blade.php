<x-app-layout>
    @section('css')
        {{-- Boostrap CDN --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        {{-- Google Fonts --}}
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
        <style>
            body {
                font-family: 'Poppins';
            }
        </style>
    @stop

    @section('content_header')
        <h5 class="fw-semibold text-md">Farmer Details</h5>
        <hr class="mt-0">
    @stop

    @section('content')
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-12 d-flex justify-content-start">
                    <form action="{{ route('barangays.index') }}" method="get">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-arrow-left me-1"></i>
                            Back</button>
                    </form>
                </div>
            </div>

            <div class="row p-2 bg-white shadow-sm">
                <div class="bg-secondary rounded-1 p-2">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-2">
                                <img src="{{ asset('assets/img/masp-logo.jpg') }}" alt="logo"
                                    class="rounded-circle border border-1" width="110" height="110">
                            </div>
                            <div class="col-10 d-flex align-items-center">
                                <div class="d-flex flex-column"> <!-- Changed flex direction to column -->
                                    <div class="d-flex flex-row">
                                        <h1 class="fw-bold me-2">BARANGAY</h1>
                                        <h1 class="fw-bold text-uppercase">{{ $barangay->name }}</h1>
                                    </div>
                                    <h6>Total Farmers: 0</h6> <!-- Moved below the h1 tags -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white p-3 mt-4">
                <div class="row">
                    <div class="col-6 d-flex justify-content-start">
                        <h5><span class="text-primary">Name:</span> {{ $farmer->first_name }} {{ $farmer->middle_name }}
                            {{ $farmer->last_name }}
                            {{ $farmer->suffix }}</h5>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <h5><span class="text-primary">Address:</span> {{ $farmer->address }}</h5>
                    </div>
                </div>
                <hr class="mt-0">
                <div class="row mt-2">
                    <div class="col-3">
                        <h6><span class="text-primary">Sex:</span> {{ $farmer->sex }}</h6>
                    </div>
                    <div class="col-3">
                        <h6><span class="text-primary">Date of Birth:</span>
                            {{ \Carbon\Carbon::parse($farmer->birth_date)->format('F d, Y') }}</h6>
                    </div>
                    <div class="col-3">
                        <h6><span class="text-primary">Contact:</span> {{ $farmer->phone_number }}</h6>
                    </div>
                    <div class="col-3">
                        <h6><span class="text-primary">Martial Status:</span> {{ $farmer->marital_status }}</h6>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-3">
                        <h6><span class="text-primary">Name of Spouse:</span> {{ $farmer->name_of_spouse }}</h6>
                    </div>
                    <div class="col-3">
                        <h6><span class="text-primary">Spouse Contact:</span> {{ $farmer->spouse_number }}</h6>
                    </div>
                    <div class="col-3">
                        <h6><span class="text-primary">Parent Name:</span> {{ $farmer->parent_name }}</h6>
                    </div>
                    <div class="col-3">
                        <h6><span class="text-primary">Parent Contact:</span> {{ $farmer->parent_number }}</h6>
                    </div>
                </div>
                <hr class="mt-2">
                <div class="row mt-4">
                    @if ($farmer->parcels)
                        @php
                            $chunks = array_chunk($farmer->parcels, ceil(count($farmer->parcels) / 2)); // Split parcels into chunks
                            $parcelCounter = 1; // Initialize the counter
                        @endphp

                        @foreach ($chunks as $chunk)
                            <div class="col-md-6"> <!-- Dynamically create a column for each chunk -->
                                @foreach ($chunk as $parcel)
                                    <p><strong>Parcel. {{ $parcelCounter++ }}</strong></p> <!-- Sequential numbering -->
                                    <p><strong>Farm Location:</strong> {{ htmlspecialchars($parcel['farm_location']) }}</p>
                                    <p><strong>Farm Area:</strong> {{ $parcel['farm_area'] }} acres</p>
                                    <p><strong>Farm Type:</strong> {{ $parcel['farm_type'] ?? 'N/A' }}</p>
                                    <p><strong>Crop Commodity:</strong> {{ $parcel['crop_commodity'] }}</p>
                                    <hr>
                                @endforeach
                            </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <p>No parcels available</p>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    @stop
</x-app-layout>
