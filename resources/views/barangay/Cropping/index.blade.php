@extends('layouts.barangay')





@section('content')
    @if (session('success'))
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Data saved",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
    <h6 class="mt-4"><i class="fa-solid fa-asterisk me-1"></i>Cropping Reports</h6>
    <hr class="mt-0">

    <div class="container-fluid">
        <div class="row">
            <div class="bg-secondary bg-opacity-25 shadow-sm py-2 rounded-1">
                <form action="{{ route('store.farmers') }}" method="POST">
                    @csrf
                    <h6 class="mb-3"><i class="fa-solid fa-caret-right me-1"></i>Farmers Personal Information</h6>
                    <div class="row px-3 mb-3">
                        <div class="col-md-4 mb-2">
                            <label for="first_name" class="form-label ms-1 mb-0">First Name</label>
                            <input type="text" class="form-control" name="first_name" placeholder="Enter first name">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="middle_name" class="form-label ms-1 mb-0">Middle Name</label>
                            <input type="text" class="form-control" name="middle_name" placeholder="Enter middle name">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="last_name" class="form-label ms-1 mb-0">Last Name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Enter last name">
                        </div>
                        <div class="col-md-4">
                            <label for="suffix" class="form-label ms-1 mb-0">Suffix</label>
                            <input type="text" class="form-control" name="suffix" placeholder="">
                        </div>
                        <div class="col-md-4">
                            <label for="sex" class="form-label ms-1 mb-0">Sex</label><br>
                            <div class="form-check form-check-inline mt-2">
                                <input class="form-check-input" type="radio" name="sex" value="male">
                                <label class="form-check-label" for="sex">Male</label>
                            </div>
                            <div class="form-check form-check-inline mt-2">
                                <input class="form-check-input" type="radio" name="sex" value="female">
                                <label class="form-check-label" for="sex">Female</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="phone_number" class="form-label ms-1 mb-0">Phone Number</label>
                            <input type="text" class="form-control" name="phone_number">
                        </div>
                    </div>
                    <div class="row px-3 mb-3">
                        <div class="col-md-12">
                            <label for="address" class="form-label ms-1 mb-0">Address</label>
                            <input type="text" class="form-control" name="address"
                                placeholder="Barangay/Municipality/City">
                        </div>

                    </div>
                    {{-- PARCEL --}}
                    <hr class="mt-0">
                    <h6 class="mb-0"><i class="fa-solid fa-caret-right me-1"></i>Cropping Description</h6>

                    {{-- PAREL 1 --}}
                    <div class="card shadow-sm mb-2 mt-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="mb-0"><i class="fa-solid fa-caret-right me-1"></i>PARCEL NO.1</h6>
                            <button class="btn btn-sm btn-light toggle-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#farmLandCardBody1" aria-expanded="false" aria-controls="farmLandCardBody1">
                                <i class="fa-solid fa-plus toggle-icon" id="toggleIcon1"></i>
                            </button>
                        </div>
                        <div class="collapse" id="farmLandCardBody1">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Variety <small>(Type of
                                                Rice)</small></label>
                                        <input type="text" class="form-control" name="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="farm_area" class="form-label ms-1 mb-0">
                                            Farm Type
                                        </label>
                                        <select class="form-select" name="farm_area" id="farm_area">
                                            <option value="" selected disabled>Select Farm Type</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                            <option value="">5</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Area</label>
                                        <input type="text" class="form-control" name="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Sowing/DS Date</label>
                                        <input type="text" class="form-control" name="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Transplanting Date</label>
                                        <input type="text" class="form-control" name="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Date Harvested</label>
                                        <input type="date" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Gross</label>
                                        <input type="text" class="form-control" name="">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Average</label>
                                        <input type="text" class="form-control" name="">
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="farm_location" class="form-label ms-1 mb-0">Farm
                                            Location/Association</label>
                                        <input type="text" class="form-control" name="farm_location"
                                            placeholder="Barangay/Municipality/City">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- PARCEL 2 --}}
                    <div class="card shadow-sm mb-2 mt-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="mb-0"><i class="fa-solid fa-caret-right me-1"></i>PARCEL N0.2</h6>
                            <button class="btn btn-sm btn-light toggle-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#farmLandCardBody2" aria-expanded="false"
                                aria-controls="farmLandCardBody2">
                                <i class="fa-solid fa-plus toggle-icon" id="toggleIcon1"></i>
                            </button>
                        </div>
                        <div class="collapse" id="farmLandCardBody2">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Variety <small>(Type of
                                                Rice)</small></label>
                                        <input type="text" class="form-control" name="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="farm_area" class="form-label ms-1 mb-0">
                                            Farm Type
                                        </label>
                                        <select class="form-select" name="farm_area" id="farm_area">
                                            <option value="" selected disabled>Select Farm Type</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                            <option value="">5</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Area</label>
                                        <input type="text" class="form-control" name="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Sowing/DS Date</label>
                                        <input type="text" class="form-control" name="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Transplanting Date</label>
                                        <input type="text" class="form-control" name="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Date Harvested</label>
                                        <input type="date" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Gross</label>
                                        <input type="text" class="form-control" name="">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Average</label>
                                        <input type="text" class="form-control" name="">
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="farm_location" class="form-label ms-1 mb-0">Farm
                                            Location/Association</label>
                                        <input type="text" class="form-control" name="farm_location"
                                            placeholder="Barangay/Municipality/City">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- PARCEL 3 --}}
                    <div class="card shadow-sm mb-2 mt-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="mb-0"><i class="fa-solid fa-caret-right me-1"></i>PARCEL NO.3</h6>
                            <button class="btn btn-sm btn-light toggle-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#farmLandCardBody3" aria-expanded="false"
                                aria-controls="farmLandCardBody3">
                                <i class="fa-solid fa-plus toggle-icon" id="toggleIcon1"></i>
                            </button>
                        </div>
                        <div class="collapse" id="farmLandCardBody3">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Variety <small>(Type of
                                                Rice)</small></label>
                                        <input type="text" class="form-control" name="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="farm_area" class="form-label ms-1 mb-0">
                                            Farm Type
                                        </label>
                                        <select class="form-select" name="farm_area" id="farm_area">
                                            <option value="" selected disabled>Select Farm Type</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                            <option value="">5</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Area</label>
                                        <input type="text" class="form-control" name="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Sowing/DS Date</label>
                                        <input type="text" class="form-control" name="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Transplanting Date</label>
                                        <input type="text" class="form-control" name="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Date Harvested</label>
                                        <input type="date" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Gross</label>
                                        <input type="date" class="form-control" name="">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Average</label>
                                        <input type="text" class="form-control" name="">
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="farm_location" class="form-label ms-1 mb-0">Farm
                                            Location/Association</label>
                                        <input type="text" class="form-control" name="farm_location"
                                            placeholder="Barangay/Municipality/City">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- PARCEL 4 --}}
                    <div class="card shadow-sm mb-2 mt-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="mb-0"><i class="fa-solid fa-caret-right me-1"></i>PARCEL NO.4</h6>
                            <button class="btn btn-sm btn-light toggle-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#farmLandCardBody4" aria-expanded="false"
                                aria-controls="farmLandCardBody4">
                                <i class="fa-solid fa-plus toggle-icon" id="toggleIcon1"></i>
                            </button>
                        </div>
                        <div class="collapse" id="farmLandCardBody4">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Variety <small>(Type of
                                                Rice)</small></label>
                                        <input type="text" class="form-control" name="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="farm_area" class="form-label ms-1 mb-0">
                                            Farm Type
                                        </label>
                                        <select class="form-select" name="farm_area" id="farm_area">
                                            <option value="" selected disabled>Select Farm Type</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                            <option value="">5</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Area</label>
                                        <input type="text" class="form-control" name="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Sowing/DS Date</label>
                                        <input type="text" class="form-control" name="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Transplanting Date</label>
                                        <input type="text" class="form-control" name="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Date Harvested</label>
                                        <input type="date" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Gross</label>
                                        <input type="text" class="form-control" name="">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Average</label>
                                        <input type="text" class="form-control" name="">
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="farm_location" class="form-label ms-1 mb-0">Farm
                                            Location/Association</label>
                                        <input type="text" class="form-control" name="farm_location"
                                            placeholder="Barangay/Municipality/City">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- PARCEL 5 --}}
                    <div class="card shadow-sm mb-2 mt-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="mb-0"><i class="fa-solid fa-caret-right me-1"></i>PARCEL NO.5</h6>
                            <button class="btn btn-sm btn-light toggle-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#farmLandCardBody5" aria-expanded="false"
                                aria-controls="farmLandCardBody5">
                                <i class="fa-solid fa-plus toggle-icon" id="toggleIcon1"></i>
                            </button>
                        </div>
                        <div class="collapse" id="farmLandCardBody5">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Variety <small>(Type of
                                                Rice)</small></label>
                                        <input type="text" class="form-control" name="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="farm_area" class="form-label ms-1 mb-0">
                                            Farm Type
                                        </label>
                                        <select class="form-select" name="farm_area" id="farm_area">
                                            <option value="" selected disabled>Select Farm Type</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                            <option value="">5</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Area</label>
                                        <input type="text" class="form-control" name="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Sowing/DS Date</label>
                                        <input type="text" class="form-control" name="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Transplanting Date</label>
                                        <input type="text" class="form-control" name="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Date Harvested</label>
                                        <input type="date" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Gross</label>
                                        <input type="text" class="form-control" name="">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="" class="form-label ms-1 mb-0">Average</label>
                                        <input type="text" class="form-control" name="">
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="farm_location" class="form-label ms-1 mb-0">Farm
                                            Location/Association</label>
                                        <input type="text" class="form-control" name="farm_location"
                                            placeholder="Barangay/Municipality/City">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('.toggle-btn').forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('#farmLandCardBody1'); // Correctly target collapse ID
                const icon = this.querySelector('.toggle-icon');
                const target = document.querySelector(targetId);

                // Check if the collapse is currently shown or hidden
                if (target.classList.contains('show')) {
                    target.classList.remove('show');
                    icon.classList.remove('fa-minus');
                    icon.classList.add('fa-plus');
                } else {
                    target.classList.add('show');
                    icon.classList.remove('fa-plus');
                    icon.classList.add('fa-minus');
                }
            });
        });
    </script>

    <script>
        document.querySelectorAll('.toggle-btn').forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('#farmLandCardBody2'); // Target collapse ID
                const icon = this.querySelector('.toggle-icon');
                const target = document.querySelector(targetId);

                // Check if the collapse is currently shown or hidden
                if (target.classList.contains('show')) {
                    target.classList.remove('show');
                    icon.classList.remove('fa-minus');
                    icon.classList.add('fa-plus');
                } else {
                    target.classList.add('show');
                    icon.classList.remove('fa-plus');
                    icon.classList.add('fa-minus');
                }
            });
        });
    </script>

    <script>
        document.querySelectorAll('.toggle-btn').forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('#farmLandCardBody3'); // Target collapse ID
                const icon = this.querySelector('.toggle-icon');
                const target = document.querySelector(targetId);

                // Check if the collapse is currently shown or hidden
                if (target.classList.contains('show')) {
                    target.classList.remove('show');
                    icon.classList.remove('fa-minus');
                    icon.classList.add('fa-plus');
                } else {
                    target.classList.add('show');
                    icon.classList.remove('fa-plus');
                    icon.classList.add('fa-minus');
                }
            });
        });
    </script>
    <script>
        document.querySelectorAll('.toggle-btn').forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('#farmLandCardBody4'); // Target collapse ID
                const icon = this.querySelector('.toggle-icon');
                const target = document.querySelector(targetId);

                // Check if the collapse is currently shown or hidden
                if (target.classList.contains('show')) {
                    target.classList.remove('show');
                    icon.classList.remove('fa-minus');
                    icon.classList.add('fa-plus');
                } else {
                    target.classList.add('show');
                    icon.classList.remove('fa-plus');
                    icon.classList.add('fa-minus');
                }
            });
        });
    </script>
    <script>
        document.querySelectorAll('.toggle-btn').forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('#farmLandCardBody5'); // Target collapse ID
                const icon = this.querySelector('.toggle-icon');
                const target = document.querySelector(targetId);

                // Check if the collapse is currently shown or hidden
                if (target.classList.contains('show')) {
                    target.classList.remove('show');
                    icon.classList.remove('fa-minus');
                    icon.classList.add('fa-plus');
                } else {
                    target.classList.add('show');
                    icon.classList.remove('fa-plus');
                    icon.classList.add('fa-minus');
                }
            });
        });
    </script>
@endsection
