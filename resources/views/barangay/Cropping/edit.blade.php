@extends('layouts.barangay')

@section('content')
    <h6 class="mt-4"><i class="fa-solid fa-asterisk me-1"></i>Edit Cropping Assessment</h6>
    <hr class="mt-0">
    <div class="container-fluid">

        <form action="{{ route('cropping.update', $assessment->id) }}" method="post">
            @csrf
            @method('PUT')

            <!-- Farmers Personal Information Section -->
            <h6 class="mb-3"><i class="fa-solid fa-caret-right me-1"></i>Farmers Personal Information</h6>
            <div class="row px-3 mb-3">
                <div class="col-md-4 mb-2">
                    <label for="first_name" class="form-label ms-1 mb-0">First Name</label>
                    <input type="text" class="form-control" name="first_name" value="{{ old('first_name', $assessment->first_name) }}" placeholder="Enter first name">
                </div>
                <div class="col-md-4 mb-2">
                    <label for="middle_name" class="form-label ms-1 mb-0">Middle Name</label>
                    <input type="text" class="form-control" name="middle_name" value="{{ old('middle_name', $assessment->middle_name) }}" placeholder="Enter middle name">
                </div>
                <div class="col-md-4 mb-2">
                    <label for="last_name" class="form-label ms-1 mb-0">Last Name</label>
                    <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $assessment->last_name) }}" placeholder="Enter last name">
                </div>
                <div class="col-md-4">
                    <label for="suffix" class="form-label ms-1 mb-0">Suffix</label>
                    <input type="text" class="form-control" name="suffix" value="{{ old('suffix', $assessment->suffix) }}">
                </div>
                <div class="col-md-4">
                    <label for="sex" class="form-label ms-1 mb-0">Sex</label><br>
                    <div class="form-check form-check-inline mt-2">
                        <input class="form-check-input" type="radio" name="sex" value="male" {{ old('sex', $assessment->sex) == 'male' ? 'checked' : '' }}>
                        <label class="form-check-label" for="sex">Male</label>
                    </div>
                    <div class="form-check form-check-inline mt-2">
                        <input class="form-check-input" type="radio" name="sex" value="female" {{ old('sex', $assessment->sex) == 'female' ? 'checked' : '' }}>
                        <label class="form-check-label" for="sex">Female</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="phone_number" class="form-label ms-1 mb-0">Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number', $assessment->phone_number) }}">
                </div>
            </div>
            <div class="row px-3 mb-3">
                <div class="col-md-12">
                    <label for="address" class="form-label ms-1 mb-0">Address</label>
                    <input type="text" class="form-control" name="address" value="{{ old('address', $assessment->address) }}" placeholder="Barangay/Municipality/City">
                </div>
            </div>

            <!-- Cropping Description Section -->
            <hr class="mt-0">
            <h6 class="mb-0"><i class="fa-solid fa-caret-right me-1"></i>Cropping Description</h6>

            <!-- Existing Parcels Section -->
            @foreach($assessment->parcels as $index => $parcel)
            <div class="parcel-card" id="parcel-{{ $index + 1 }}">
                <div class="card shadow-sm mb-2 mt-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0"><i class="fa-solid fa-caret-right me-1"></i>PARCEL NO. {{ $index + 1 }}</h6>
                        <button class="btn btn-sm btn-light toggle-btn" type="button" data-bs-toggle="collapse" data-bs-target="#farmLandCardBody{{ $index + 1 }}" aria-expanded="false" aria-controls="farmLandCardBody{{ $index + 1 }}">
                            <i class="fa-solid fa-plus toggle-icon"></i>
                        </button>
                    </div>
                    <div class="collapse" id="farmLandCardBody{{ $index + 1 }}">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label class="form-label ms-1 mb-0">Farm Location</label>
                                    <input type="text" class="form-control" name="farm_location[]" value="{{ old('farm_location.' . $index, $parcel['farm_location'] ?? '') }}" placeholder="Barangay/Municipality/City">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label ms-1 mb-0">Variety</label>
                                    <input type="text" class="form-control" name="variety[]" value="{{ old('variety.' . $index, $parcel['variety'] ?? '') }}" placeholder="Variety">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label ms-1 mb-0">Farm Type</label>
                                    <input type="text" class="form-control" name="farm_type[]" value="{{ old('farm_type.' . $index, $parcel['farm_type'] ?? '') }}" placeholder="Farm Type">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label class="form-label ms-1 mb-0">Area <small>(In Hectares)</small></label>
                                    <input type="text" class="form-control" name="area[]" value="{{ old('area.' . $index, $parcel['area'] ?? '') }}" placeholder="Area">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label ms-1 mb-0">Sowing Date</label>
                                    <input type="date" class="form-control" name="sowing_date[]" value="{{ old('sowing_date.' . $index, $parcel['sowing_date'] ?? '') }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label ms-1 mb-0">Transplanting Date</label>
                                    <input type="date" class="form-control" name="transplanting_date[]" value="{{ old('transplanting_date.' . $index, $parcel['transplanting_date'] ?? '') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label class="form-label ms-1 mb-0">Date Harvested</label>
                                    <input type="date" class="form-control" name="date_harvested[]" value="{{ old('date_harvested.' . $index, $parcel['date_harvested'] ?? '') }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label ms-1 mb-0">Gross Yield</label>
                                    <input type="text" class="form-control" name="gross[]" value="{{ old('gross.' . $index, $parcel['gross'] ?? '') }}" placeholder="Gross Yield">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label ms-1 mb-0">Average Yield</label>
                                    <input type="text" class="form-control" name="average[]" value="{{ old('average.' . $index, $parcel['average'] ?? '') }}" placeholder="Average Yield">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

            <div class="row">
                <div class="col-md-12 d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Update Cropping Assessment</button>
                    <a type="submit" href="{{ route('list.cropping') }}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>

    </div>
@endsection

@push('scripts')
    <script>
        // Script for adding a new parcel dynamically
        $('#addParcelBtn').click(function() {
            var parcelCount = $('#parcelContainer .parcel-card').length + 1;
            var template = $('#parcelTemplate').html();
            template = template.replace(/PARCEL NO./g, 'PARCEL NO. ' + parcelCount);
            template = template.replace(/parcel-[0-9]+/g, 'parcel-' + parcelCount);
            $('#parcelContainer').append(template);
        });

        // Initialize DataTable if needed
        $(document).ready(function() {
            $('#farmersTable').DataTable({
                responsive: true,
                paging: true,
                ordering: true,
                searching: true,
                columnDefs: [{
                    orderable: false,
                    targets: [4] // Disable sorting on the "Action" column (index 4)
                }]
            });
        });
    </script>
@endpush
