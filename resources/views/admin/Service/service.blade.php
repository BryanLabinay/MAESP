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
        <h5 class="fw-semibold text-md">Services</h5>
        <hr class="mt-0">

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
                    timer: 3000,
                    timerPr0ogressBar: true,
                });
                (async () => {
                    await Toast.fire({
                        icon: 'success',
                        title: 'Service added!'
                    })
                })()
            </script>
        @endif
    @stop

    @section('content')
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-12 d-flex justify-content-end">
                    <!-- Add Services Button -->
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                        Add Services
                    </button>

                </div>
            </div>
            {{-- <hr class="mt-0"> --}}
            <div class="row">
                @foreach ($services as $service)
                    @php
                        $images = json_decode($service->image); // Decode the image JSON array
                    @endphp
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <a href="{{ route('service.create', $service->id) }}" class="text-decoration-none">
                            <div class="card h-100 service-card shadow-sm border-0">
                                <!-- Show the first image if available -->
                                @if ($images && count($images) > 0)
                                    <img src="{{ asset($images[0]) }}" class="card-img-top img-fluid rounded-top"
                                        style="height: 200px; object-fit: cover;" alt="Service Image">
                                @else
                                    <img src="{{ asset('assets/img/default.jpg') }}"
                                        class="card-img-top img-fluid rounded-top" style="height: 200px; object-fit: cover;"
                                        alt="Placeholder Image">
                                @endif

                                <div class="card-body d-flex flex-column align-items-center text-center">
                                    <h5 class="card-title mb-2 text-primary fw-bold">{{ $service->service_name }}</h5>
                                    <button class="btn btn-outline-primary mt-auto">View Details</button>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>



        </div>



        <!-- Modal Structure -->
        <div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="addServiceModalLabel">Add New Service</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form id="addServiceForm" method="POST" action="{{ route('service.store') }}"
                            enctype="multipart/form-data">
                            <!-- CSRF Token -->
                            @csrf
                            <!-- Service Name Field -->
                            <div class="mb-3">
                                <label for="serviceName" class="form-label">Service Name</label>
                                <input type="text" class="form-control" id="serviceName" name="service_name"
                                    placeholder="Enter service name">
                            </div>
                            <!-- Price Field -->
                            <div class="mb-3">
                                <label for="servicePrice" class="form-label">Image</label>
                                <input type="file" class="form-control" id="img" name="image[]"
                                    placeholder="add file" multiple>
                            </div>
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Add Service</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Include Bootstrap JS -->
    @stop


    @section('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

        <script>
            $(document).ready(function() {
                bsCustomFileInput.init();
            });
        </script>
        {{-- TextArea --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const descriptionTextarea = document.getElementById('description');

                function adjustTextareaHeight() {
                    descriptionTextarea.style.height = 'auto';
                    descriptionTextarea.style.height = descriptionTextarea.scrollHeight + 'px';
                }

                descriptionTextarea.addEventListener('input', function() {
                    adjustTextareaHeight();
                });

                adjustTextareaHeight();
            });
        </script>
    @stop
</x-app-layout>
