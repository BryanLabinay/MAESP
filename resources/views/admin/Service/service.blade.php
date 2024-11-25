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
    @stop

    @section('content')
        <div class="container-fluid">
            <div class="container">
                <div class="row bg-olive rounded shadow-lg py-3">
                    <div class="col-7 border border-1 border-light rounded ms-2 px-3">
                        <div class="d-flex justify-content-center align-items-center mt-2">
                            <h6 class="text-dark p-0 bg-light px-5 rounded-pill">Add Service</h6>
                        </div>
                        <div class="">
                            <form action="" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-8">
                                        <div class="mb-3">
                                            <label for="text" class="form-label fw-medium">Service Name:</label>
                                            <input type="text" name="service_name" class="form-control" id="service_name"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="description" class="form-label fw-medium">Description:</label>
                                            <textarea name="description" id="description" class="form-control" cols="30" rows="2"
                                                placeholder="Enter service description here"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="img" class="form-label">Service Image:</label>
                                            <input type="file" class="form-control" name="image" id="image">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-4 border border-1 border-light rounded mx-4">
                        <div class="d-flex justify-content-center align-items-center mt-2">
                            <h6 class="text-dark p-0 bg-light px-5 rounded-pill">Services List</h6>
                        </div>
                        {{-- Put the forelse here --}}
                        <div class="clickable-container position-relative mb-1">
                            <a href="#" class="stretched-link text-decoration-none">
                                <div class="d-flex align-items-center bg-light rounded-1 px-3">
                                    <div class="list-group">
                                        <div class="p-2">
                                            <div class="flex-grow-1">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6 class="mb-0 text-dark fw-bold">Free Fertilizer</h6>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="mb-0 text-muted">
                                                            Lorem ipsum dolor sit amet.
                                                            {{-- {{ strlen($data->email) > 40 ? substr($data->email, 0, 40) . '...' : $data->email }} --}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        {{-- Put the forelse here --}}
                        <div class="clickable-container position-relative mb-1">
                            <a href="#" class="stretched-link text-decoration-none">
                                <div class="d-flex align-items-center bg-light rounded-1 px-3">
                                    <div class="list-group">
                                        <div class="p-2">
                                            <div class="flex-grow-1">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6 class="mb-0 text-dark fw-bold">Goverment</h6>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="mb-0 text-muted">
                                                            Lorem ipsum dolor sit amet.
                                                            {{-- {{ strlen($data->email) > 40 ? substr($data->email, 0, 40) . '...' : $data->email }} --}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @stop
</x-app-layout>
