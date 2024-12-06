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
        <h5 class="fw-semibold text-md">Activity Log</h5>
        <hr class="mt-0">
    @stop

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-8 d-flex justify-content-center">
                    <div class="bg-secondary p-2 text-black px-3 rounded-1 bg-opacity-25" style="width: 650px;">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <h5 class="fw-semibold text-dark">Service Form</h5>
                            <hr class="mt-0 text-black">
                            <div class="form-group">
                                <label for="">Service Name:</label>
                                <input name="service" type="text" required class="form-control"
                                    placeholder="Enter the name here..." autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Type your description here..."
                                    rows="1" style="height: auto; overflow-y: hidden;" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Image</label>
                                <input type="file" name="img" id="img" class="form-control">
                            </div>
                            <div class="d-flex justify-content-start">
                                <button class="btn btn-primary px-5 ">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-4 p-0">
                    <div class="bg-secondary bg-opacity-25 p-0 rounded-1 text-black">
                        <h5 class="text-center">Service List</h5>
                    </div>
                    {{-- @forelse ($services as $service) --}}
                    <div class="clickable-container position-relative mb-1">
                        <a href="" class="stretched-link text-decoration-none">
                            <div class="d-flex align-items-center bg-secondary bg-opacity-25 rounded-1 px-3">
                                <div class="me-3">
                                    {{-- <img src="{{ asset('uploads/service/' . $service->img) }}"
                                            class="border border-1 border-secondary object-fit" height="50"
                                            width="50" alt="{{ $service->service }}"
                                            style="border-radius:50%; object-fit: cover;"> --}}
                                </div>
                                <div class="list-group">
                                    <div class="p-2">
                                        <div class="flex-grow-1">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h6 class="mb-0 text-dark fw-bold">Fertilizer</h6>
                                                </div>
                                                <div class="col-12">
                                                    <p class="mb-0 text-muted">
                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                                        Praesentium, hic.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- @empty
                        <div class="row d-flex justify-content-center">
                            <div class="col-5">
                                <div class="bg-secondary bg-opacity-25 rounded-1 shadow-sm">
                                    <h5 class="text-center text-black">No Service</h5>
                                </div>
                            </div>
                        </div>
                    @endforelse --}}
                </div>
            </div>
        </div>
    @stop


    @section('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
