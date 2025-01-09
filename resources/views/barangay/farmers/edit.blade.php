@extends('layouts.barangay')
@section('content')
<h6 class="mt-4"><i class="fa-solid fa-asterisk me-1"></i>Edit {{ $farmer->first_name }} Data</h6>
<hr class="mt-0">

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Update Farmer Information</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('farmers.update', $farmer->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Farmer Details -->
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name', $farmer->first_name) }}" required>
                    </div>
                    <div class="col-md-3">
                        <label for="middle_name" class="form-label">Middle Name</label>
                        <input type="text" id="middle_name" name="middle_name" class="form-control" value="{{ old('middle_name', $farmer->middle_name) }}">
                    </div>
                    <div class="col-md-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name', $farmer->last_name) }}" required>
                    </div>
                    <div class="col-md-3">
                        <label for="suffix" class="form-label">Suffix</label>
                        <input type="text" id="suffix" name="suffix" class="form-control" value="{{ old('suffix', $farmer->suffix) }}">
                    </div>
                </div>

                <!-- Additional Farmer Details -->
                <div class="row mb-3">

                    <div class="col-md-3">
                        <label for="sex" class="form-label">Sex</label>
                        <select id="sex" name="sex" class="form-select" required>
                            <option value="male" {{ old('sex', $farmer->sex) === 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('sex', $farmer->sex) === 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>


                    <div class="col-md-3">
                        <label for="birth_date" class="form-label">Birth Date</label>
                        <input type="date" id="birth_date" name="birth_date" class="form-control" value="{{ old('birth_date', $farmer->birth_date) }}" required>
                    </div>
                    <div class="col-md-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" id="phone_number" name="phone_number" class="form-control" value="{{ old('phone_number', $farmer->phone_number) }}" required>
                    </div>
                </div>

                <!-- Address Section -->
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" id="address" name="address" class="form-control" value="{{ old('address', $farmer->address) }}">
                    </div>
                </div>

                <!-- Parcels Section -->
                <div id="parcels">
                    @foreach ($farmer->parcels as $index => $parcel)
                    <div class="card mb-3 parcel" data-index="{{ $index }}">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <strong>Parcel {{ $loop->iteration }}</strong>
                            <button type="button" class="btn btn-danger btn-sm remove-parcel">Remove</button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="farm_location_{{ $index }}" class="form-label">Farm Location</label>
                                    <input type="text" id="farm_location_{{ $index }}" name="parcels[{{ $index }}][farm_location]" class="form-control" value="{{ old('parcels.' . $index . '.farm_location', $parcel['farm_location']) }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="farm_area_{{ $index }}" class="form-label">Farm Area</label>
                                    <input type="number" id="farm_area_{{ $index }}" name="parcels[{{ $index }}][farm_area]" class="form-control" value="{{ old('parcels.' . $index . '.farm_area', $parcel['farm_area']) }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="farm_type_{{ $index }}" class="form-label">Farm Type</label>
                                    <input type="text" id="farm_type_{{ $index }}" name="parcels[{{ $index }}][farm_type]" class="form-control" value="{{ old('parcels.' . $index . '.farm_type', $parcel['farm_type']) }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="crop_commodity_{{ $index }}" class="form-label">Crop Commodity</label>
                                    <input type="text" id="crop_commodity_{{ $index }}" name="parcels[{{ $index }}][crop_commodity]" class="form-control" value="{{ old('parcels.' . $index . '.crop_commodity', $parcel['crop_commodity']) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-end gap-2 mt-3">
                    <button type="submit" class="btn btn-primary">Update Farmer</button>
                    <a href="{{ route('list.farmers') }}" class="btn btn-secondary">Cancel</a>
                </div>

            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const parcelsContainer = document.getElementById('parcels');
            parcelsContainer.addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-parcel')) {
                    const parcelCard = e.target.closest('.parcel');
                    const parcelIndex = parcelCard.dataset.index;

                    // Add hidden input to track deleted parcels
                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'deleted_parcels[]';
                    hiddenInput.value = parcelIndex;
                    parcelCard.closest('form').appendChild(hiddenInput);

                    // Remove the parcel from the view
                    parcelCard.remove();
                }
            });
        });
        </script>
</div>

<!-- Script to Handle Parcel Removal -->

@endsection
