<x-app-layout>
    @section('css')
        {{-- Boostrap CDN --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    @stop

    @section('content_header')
        <h5 class="fw-semibold text-md">Brgy.Offices</h5>
        <hr class="mt-0">
    @stop

    @section('content')
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12 d-flex justify-content-end">
                    <form action="" method="GET" class="form-inline">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control me-2" placeholder="Search Barangay"
                                value="">
                        </div>
                        <button type="submit" class="btn btn-primary fw-semibold"><i
                                class="fa-solid fa-magnifying-glass me-1"></i>Search</button>
                    </form>
                </div>
            </div>
            <hr class="mt-0">

            <div class="row mt-3">
                @foreach ($barangays as $barangay)
                    <div class="col-2">
                        <a href="{{ 'details/' . $barangay['id'] }}" class="text-decoration-none">
                            <div class="card-group">
                                <div class="card p-0">
                                    <img src="{{ $barangay->image ? asset('brgy_images/' . $barangay->image) : asset('assets/img/masp-logo.jpg') }}"
                                        class="card-img-top" alt="Image of {{ $barangay->name }}" height="120"
                                        style="object-fit:cover;">

                                    <div class="text-center bg-success">
                                        <h6 class="fw-semibold text-uppercase mt-1">{{ $barangay->name }}</h6>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Modal Structure -->
        <div class="modal fade" id="addBarangayModal" tabindex="-1" aria-labelledby="addBarangayModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="addBarangayModalLabel">Add Barangay</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Modal Form Content -->
                        <form id="addBarangayForm" action="{{ route('store.brgy') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="barangayName" class="form-label">Barangay Name</label>
                                <input type="text" class="form-control" id="brgy_name" name="brgy_name"
                                    placeholder="Enter Barangay Name" required>
                            </div>

                            <div class="mb-3">
                                <label for="cityMunicipality" class="form-label">City/Municipality</label>
                                <input type="text" class="form-control" id="cityMunicipality" name="municipality"
                                    placeholder="Enter City/Municipality" required>
                            </div>

                            <div class="mb-3">
                                <label for="Zipcode" class="form-label">Zip Code</label>
                                <input type="text" class="form-control" id="barangayCode" name="zip_code"
                                    placeholder="Enter Zip Code (optional)">
                            </div>

                            <div class="mb-3">
                                <label for="barangayImage" class="form-label">Barangay Image</label>
                                <input type="file" class="form-control" id="barangayImage" name="image"
                                    accept="image/*">
                            </div>

                            <button type="submit" class="btn btn-primary">Add Barangay</button>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" form="addBarangayForm" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>

    @stop


</x-app-layout>
