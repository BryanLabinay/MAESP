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
                <form action="{{ route('store.cropping') }}" method="POST">
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
                    <!-- Container for parcels -->
                    <div id="parcelContainer">
                        <!-- Initial Parcel 1 -->
                        <div class="parcel-card" id="parcel-1">
                            <div class="card shadow-sm mb-2 mt-3">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0"><i class="fa-solid fa-caret-right me-1"></i>PARCEL NO. 1</h6>
                                    <button class="btn btn-sm btn-light toggle-btn" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#farmLandCardBody1" aria-expanded="false"
                                        aria-controls="farmLandCardBody1">
                                        <i class="fa-solid fa-plus toggle-icon"></i>
                                    </button>
                                </div>
                                <div class="collapse" id="farmLandCardBody1">
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label class="form-label ms-1 mb-0">Farm Location</label>
                                                <input type="text" class="form-control" name="farm_location[]"
                                                    placeholder="Barangay/Municipality/City">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label ms-1 mb-0">Variety</label>
                                                <input type="text" class="form-control" name="variety[]"
                                                    placeholder="Variety">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label ms-1 mb-0">Farm Type</label>
                                                <input type="text" class="form-control" name="farm_type[]"
                                                    placeholder="Farm Type">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label class="form-label ms-1 mb-0">Area <small>(In
                                                        Hectares)</small></label>
                                                <input type="text" class="form-control" name="area[]"
                                                    placeholder="Area">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label ms-1 mb-0">Sowing Date</label>
                                                <input type="date" class="form-control" name="sowing_date[]">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label ms-1 mb-0">Transplanting Date</label>
                                                <input type="date" class="form-control" name="transplanting_date[]">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label class="form-label ms-1 mb-0">Date Harvested</label>
                                                <input type="date" class="form-control" name="date_harvested[]">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label ms-1 mb-0">Gross Yield</label>
                                                <input type="text" class="form-control" name="gross[]"
                                                    placeholder="Gross Yield">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label ms-1 mb-0">Average Yield</label>
                                                <input type="text" class="form-control" name="average[]"
                                                    placeholder="Average Yield">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <template id="parcelTemplate">
                        <div class="parcel-card">
                            <div class="card shadow-sm mb-2 mt-3">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">
                                        <i class="fa-solid fa-caret-right me-1"></i>PARCEL NO. <span
                                            class="parcel-number"></span>
                                    </h6>
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
                                            <div class="col-md-4">
                                                <label class="form-label ms-1 mb-0">Farm Location</label>
                                                <input type="text" class="form-control" name="farm_location[]"
                                                    placeholder="Barangay/Municipality/City">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label ms-1 mb-0">Variety</label>
                                                <input type="text" class="form-control" name="variety[]"
                                                    placeholder="Variety">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label ms-1 mb-0">Farm Type</label>
                                                <input type="text" class="form-control" name="farm_type[]"
                                                    placeholder="Farm Type">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label class="form-label ms-1 mb-0">Area <small>(In
                                                        Hectares)</small></label>
                                                <input type="text" class="form-control" name="area[]"
                                                    placeholder="Area">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label ms-1 mb-0">Sowing Date</label>
                                                <input type="date" class="form-control" name="sowing_date[]">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label ms-1 mb-0">Transplanting Date</label>
                                                <input type="date" class="form-control" name="transplanting_date[]">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label class="form-label ms-1 mb-0">Date Harvested</label>
                                                <input type="date" class="form-control" name="date_harvested[]">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label ms-1 mb-0">Gross Yield</label>
                                                <input type="text" class="form-control" name="gross[]"
                                                    placeholder="Gross Yield">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label ms-1 mb-0">Average Yield</label>
                                                <input type="text" class="form-control" name="average[]"
                                                    placeholder="Average Yield">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>

                    <script>
                        function deleteParcel(button) {
                            const parcelCard = button.closest('.parcel-card');
                            parcelCard.remove();
                        }
                    </script>





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
