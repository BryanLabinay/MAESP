@extends('layouts.barangay')

@section('content')
    @if (session('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 2500,
                timerPr0ogressBar: true,
            });
            (async () => {
                await Toast.fire({
                    icon: 'success',
                    title: 'Farmers Added'
                })
            })()
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
                        <div class="col-md-4 mb-2">
                            <label for="first_name" class="form-label ms-1 mb-0">First Name</label>
                            <input type="text" class="form-control" name="first_name" placeholder="Enter first name"
                                required>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="middle_name" class="form-label ms-1 mb-0">Middle Name</label>
                            <input type="text" class="form-control" name="middle_name" placeholder="Enter middle name">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="last_name" class="form-label ms-1 mb-0">Last Name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Enter last name"
                                required>
                        </div>
                        <div class="col-md-4">
                            <label for="suffix" class="form-label ms-1 mb-0">Suffix</label>
                            <input type="text" class="form-control" name="suffix" placeholder="">
                        </div>
                        <div class="col-md-4">
                            <label for="sex" class="form-label ms-1 mb-0">Sex</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sex" value="male" required>
                                <label class="form-check-label" for="sex">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sex" value="female" required>
                                <label class="form-check-label" for="sex">Female</label>
                            </div>
                        </div>
                    </div>
                    <div class="row px-3 mb-3">
                        <div class="col-md-4">
                            <label for="birth_date" class="form-label ms-1 mb-0">Date of Birth</label>
                            <input type="date" class="form-control" name="birth_date" required>
                        </div>
                        <div class="col-md-4">
                            <label for="phone_number" class="form-label ms-1 mb-0">Phone Number</label>
                            <input type="tel" class="form-control @error('phone_number') is-invalid @enderror"
                                name="phone_number" id="phone_number" required>

                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="marital_status" class="form-label ms-1 mb-0">Civil Status</label>
                            <select class="form-select" name="marital_status" id="marital_status" required>
                                <option value="" disabled selected>Select</option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="divorced">Divorced</option>
                                <option value="widowed">Widowed</option>
                            </select>
                        </div>
                    </div>
                    <div class="row px-3 mb-3">
                        <div class="col-md-8">
                            <label for="address" class="form-label ms-1 mb-0">Name of Spouse(If Married)</label>
                            <input type="text" class="form-control" name="name_of_spouse" required>
                        </div>
                        <div class="col-md-4">
                            <label for="phone_number" class="form-label ms-1 mb-0">Phone Number</label>
                            <input type="tel" class="form-control @error('spouse_number') is-invalid @enderror"
                                name="spouse_number" required>
                            @error('spouse_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    <div class="row px-3 mb-3">
                        <div class="col-md-8">
                            <label for="address" class="form-label ms-1 mb-0">Mother/Fathers Name</label>
                            <input type="text" class="form-control" name="parent_name" required>
                        </div>
                        <div class="col-md-4">
                            <label for="phone_number" class="form-label ms-1 mb-0">Phone Number</label>
                            <input type="tel" class="form-control @error('parent_number') is-invalid @enderror"
                                name="parent_number" required>
                            @error('parent_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row px-3 mb-3">
                        <div class="col-md-12">
                            <label for="address" class="form-label ms-1 mb-0">Address</label>
                            <input type="text" class="form-control" name="address"
                                placeholder="Barangay/Municipality/City" required>
                        </div>
                    </div>
                    {{-- PARCEL --}}
                    <hr class="mt-0">
                    <h6 class="mb-0"><i class="fa-solid fa-caret-right me-1"></i>Farm Land Description</h6>



                    <!-- Container for parcels -->
                    <div id="parcelContainer">
                        <!-- Initial Parcel 1 -->
                        <div class="parcel-card" id="parcel-1">
                            <div class="card shadow-sm mb-2 mt-3">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0"><i class="fa-solid fa-caret-right me-1"></i>PARCEL NO.1</h6>
                                    <button class="btn btn-sm btn-light toggle-btn" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#farmLandCardBody1"
                                        aria-expanded="false" aria-controls="farmLandCardBody1">
                                        <i class="fa-solid fa-plus toggle-icon"></i>
                                    </button>
                                </div>
                                <div class="collapse" id="farmLandCardBody1">
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label for="farm_location_1" class="form-label ms-1 mb-0">Farm
                                                    Location</label>
                                                <input type="text" class="form-control" name="farm_location[]"
                                                    placeholder="Barangay/Municipality/City">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label class="form-label ms-1 mb-0">Total Farm Area <small>(In
                                                        Hectares)</small></label>
                                                <input type="text" class="form-control" name="farm_area[]">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label ms-1 mb-0">Farm Type</label>
                                                <select class="form-select" name="farm_type[]">
                                                    <option value="" selected disabled>Select Farm Type</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label ms-1 mb-0">Crop/Commodity</label>
                                                <input type="text" class="form-control" name="crop_commodity[]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Template for new parcels -->
                    <template id="parcelTemplate">
                        <div class="parcel-card">
                            <div class="card shadow-sm mb-2 mt-3">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0"><i class="fa-solid fa-caret-right me-1"></i>PARCEL NO.<span
                                            class="parcel-number"></span></h6>
                                    <div>
                                        <button class="btn btn-sm btn-light toggle-btn" type="button"
                                            data-bs-toggle="collapse">
                                            <i class="fa-solid fa-plus toggle-icon"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger delete-btn" type="button"
                                            onclick="deleteParcel(this)">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="collapse">
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label class="form-label ms-1 mb-0">Farm Location</label>
                                                <input type="text" class="form-control" name="farm_location[]"
                                                    placeholder="Barangay/Municipality/City">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label class="form-label ms-1 mb-0">Total Farm Area <small>(In
                                                        Hectares)</small></label>
                                                <input type="text" class="form-control" name="farm_area[]">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label ms-1 mb-0">Farm Type</label>
                                                <select class="form-select" name="farm_type[]">
                                                    <option value="" selected disabled>Select Farm Type</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label ms-1 mb-0">Crop/Commodity</label>
                                                <input type="text" class="form-control" name="crop_commodity[]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-between">
                            <button type="button" class="btn btn-primary" id="addParcelBtn">Add Parcel</button>

                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <script>
        function deleteParcel(button) {
            const parcelCard = button.closest('.parcel-card');
            parcelCard.remove();
        }
    </script>

    <script>
        document.getElementById('addParcelBtn').addEventListener('click', function() {
            const template = document.getElementById('parcelTemplate').content.cloneNode(true);
            const parcelCount = document.querySelectorAll('.parcel-card').length + 1;

            // Update parcel number
            template.querySelector('.parcel-number').textContent = parcelCount;

            // Update collapse ID and toggle target
            const collapseId = `farmLandCardBody${parcelCount}`;
            template.querySelector('.collapse').id = collapseId;
            template.querySelector('.toggle-btn').setAttribute('data-bs-target', `#${collapseId}`);

            // Clear input fields (optional)
            template.querySelectorAll('input, select').forEach(field => field.value = '');

            // Append to container
            document.getElementById('parcelContainer').appendChild(template);
        });
    </script>

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
