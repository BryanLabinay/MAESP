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
            <div class="row">
                <form action="">
                    <div class="d-flex justify-content-end">
                        <!-- Button to trigger modal -->
                        <button type="button" class="btn btn-success fw-semibold" data-bs-toggle="modal"
                            data-bs-target="#addBarangayModal">
                            <i class="fa-solid fa-plus me-1"></i>Add Barangay
                        </button>
                    </div>
                </form </div>

                <div class="row mt-3">
                    <div class="col-2">
                        <a href="#" class="text-decoration-none">
                            <div class="card-group">
                                <div class="card p-0">
                                    <img src="{{ asset('assets/img/offices/img1.jpg') }}" class="card-img-top"
                                        alt="..." height="120" style="object-fit:cover;">
                                    <div class="text-center mt-1">
                                        <h6 class="fw-semibold">Brgy. Toran</h6>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="#" class="text-decoration-none">
                            <div class="card-group">
                                <div class="card p-0">
                                    <img src="{{ asset('assets/img/offices/img2.jpg') }}" class="card-img-top"
                                        alt="..." height="120" style="object-fit:cover;">
                                    <div class="text-center mt-1">
                                        <h6 class="fw-semibold">Brgy. Maura</h6>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="#" class="text-decoration-none">
                            <div class="card-group">
                                <div class="card p-0">
                                    <img src="{{ asset('assets/img/offices/img3.jpg') }}" class="card-img-top"
                                        alt="..." height="120" style="object-fit:cover;">
                                    <div class="text-center mt-1">
                                        <h6 class="fw-semibold">Brgy. San Antonio</h6>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="#" class="text-decoration-none">
                            <div class="card-group">
                                <div class="card p-0">
                                    <img src="{{ asset('assets/img/offices/img4.jpg') }}" class="card-img-top"
                                        alt="..." height="120" style="object-fit:cover;">
                                    <div class="text-center mt-1">
                                        <h6 class="fw-semibold">Brgy. Dodan</h6>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="#" class="text-decoration-none">
                            <div class="card-group">
                                <div class="card p-0">
                                    <img src="{{ asset('assets/img/offices/img5.jpg') }}" class="card-img-top"
                                        alt="..." height="120" style="object-fit:cover;">
                                    <div class="text-center mt-1">
                                        <h6 class="fw-semibold">Brgy. Minanga</h6>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="#" class="text-decoration-none">
                            <div class="card-group">
                                <div class="card p-0">
                                    <img src="{{ asset('assets/img/offices/img6.jpg') }}" class="card-img-top"
                                        alt="..." height="120" style="object-fit:cover;">
                                    <div class="text-center mt-1">
                                        <h6 class="fw-semibold">Brgy. Macanaya</h6>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
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
                            <form id="addBarangayForm" action="">
                                <div class="mb-3">
                                    <label for="barangayName" class="form-label">Barangay Name</label>
                                    <input type="text" class="form-control" id="barangayName"
                                        placeholder="Enter Barangay Name">
                                </div>
                                <!-- Additional form fields can go here -->
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
