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
    <h6 class="mt-4"><i class="fa-solid fa-asterisk me-1"></i>Add Farmers</h6>
    <hr class="mt-0">

    <div class="container-fluid">
        <div class="row">
            <div class="bg-secondary bg-opacity-25 shadow-sm py-2 rounded-1">
                <form action="{{ route('store.farmers') }}" method="POST">
                    @csrf
                    <h6 class="mb-3"><i class="fa-solid fa-caret-right me-1"></i>Farmers Personal Information</h6>
                    <div class="row px-3 mb-3">
                        <div class="col-md-4">
                            <label for="first_name" class="form-label ms-1 mb-0">First Name</label>
                            <input type="text" class="form-control" name="first_name" placeholder="Enter first name">
                        </div>
                        <div class="col-md-4">
                            <label for="last_name" class="form-label ms-1 mb-0">Last Name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Enter last name">
                        </div>
                        <div class="col-md-4">
                            <label for="sex" class="form-label ms-1 mb-0">Sex</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sex" value="male">
                                <label class="form-check-label" for="sex">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sex" value="female">
                                <label class="form-check-label" for="sex">Female</label>
                            </div>
                        </div>
                    </div>
                    <div class="row px-3 mb-3">
                        <div class="col-md-4">
                            <label for="marital_status" class="form-label ms-1 mb-0">Marital Status</label>
                            <select class="form-select" name="marital_status" id="marital_status">
                                <option value="" disabled selected>Select</option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="divorced">Divorced</option>
                                <option value="widowed">Widowed</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="birth_date" class="form-label ms-1 mb-0">Date of Birth</label>
                            <input type="date" class="form-control" name="birth_date">
                        </div>
                        <div class="col-md-4">
                            <label for="address" class="form-label ms-1 mb-0">Address</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                    </div>
                    <div class="row px-3 mb-3">
                        <div class="col-md-4">
                            <label for="phone_number" class="form-label ms-1 mb-0">Phone Number</label>
                            <input type="text" class="form-control" name="phone_number">
                        </div>
                        <div class="col-md-4">
                            <label for="email" class="form-label ms-1 mb-0">Email Address</label>
                            <input type="email" class="form-control" name="email" placeholder="example@gmail.com">
                        </div>
                    </div>

                    <hr class="mt-0">
                    <h6 class="mb-3"><i class="fa-solid fa-caret-right me-1"></i>Farm Information</h6>
                    <div class="row px-3 mb-3">
                        <div class="col-md-4">
                            <label for="farm_name" class="form-label ms-1 mb-0">Farm Name</label>
                            <input type="text" class="form-control" name="farm_name" placeholder="Enter farm name">
                        </div>
                        <div class="col-md-4">
                            <label for="farm_location" class="form-label ms-1 mb-0">Farm Location</label>
                            <input type="text" class="form-control" name="farm_location"
                                placeholder="Enter farm location">
                        </div>
                        <div class="col-md-4">
                            <label for="farm_size" class="form-label ms-1 mb-0">Farm Size</label>
                            <input type="text" class="form-control" name="farm_size" placeholder="Acres, Hectares">
                        </div>
                    </div>


                    <div class="row px-3 mb-3">
                        <div class="col-md-4">
                            <label for="crop_type" class="form-label ms-1 mb-0">Types of Crop</label>
                            <select class="form-select" name="crop_type" id="crop_type">
                                <option value="" disabled selected>Select</option>
                                <option value="rice">Rice</option>
                                <option value="corn">Corn</option>
                                <option value="vegetables">Vegetables</option>
                                <option value="fruits">Fruits</option>
                            </select>
                        </div>
                    </div>

                    <div class="row px-3 mb-3">
                        <div class="col-md-4">
                            <label for="ownership_type" class="form-label ms-1 mb-0">Ownership Type</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ownership_type"
                                    value="Registered Owner">
                                <label class="form-check-label" for="ownership_type">Registered Owner</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ownership_type" value="Tenant">
                                <label class="form-check-label" for="ownership_type">Tenant</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ownership_type" value="Lessee">
                                <label class="form-check-label" for="ownership_type">Lessee</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ownership_type" value="Others">
                                <label class="form-check-label" for="ownership_type">Others</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="name_of_owner" class="form-label ms-1 mb-0">Name of Owner (if applicable)</label>
                            <input type="text" class="form-control" name="name_of_owner">
                        </div>
                    </div>



                    <div class="row px-3 mb-3">
                        <div class="col-md-4">
                            <label for="farm_type" class="form-label ms-1 mb-0">Farm Type</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="farm_type" value="Irrigated">
                                <label class="form-check-label" for="farm_type">Irrigated</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="farm_type" value="Rainfed Upland">
                                <label class="form-check-label" for="farm_type">Rainfed Upland</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="farm_type" value="Rainfed Lowland">
                                <label class="form-check-label" for="farm_type">Rainfed Lowland</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
