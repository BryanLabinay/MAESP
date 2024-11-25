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
        <h5 class="fw-semibold text-md">Crop Assessment</h5>
        <hr class="mt-0">
    @stop

    @section('content')
        <div class="container-fluid">
            <div class="container">
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
                        <div class="col-2 mb-3">
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
        </div>
    @stop
</x-app-layout>
