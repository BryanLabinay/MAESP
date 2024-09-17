{{-- @extends('adminlte::auth.register') --}}
{{-- @extends('adminlte::auth.register') --}}
@extends('adminlte::master')

@section('adminlte_css')

    <!-- Favicons -->
    <link href="{{ url('assets/img/doa-logo.png') }}" rel="icon">

    {{-- Google Font --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">


    {{-- Boostrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: "Poppins", sans-serif;
            overflow: hidden;
        }

        @keyframes zoomOut {
            from {
                opacity: 0;
                transform: scale(1.2);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .zoom-out {
            animation: zoomOut .7s ease-in-out;
        }
    </style>
    @yield('css')
@stop

@section('classes_body', 'login-page')

@section('body')
    <!-- Include Bootstrap CSS in your header -->


    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="login-box bg-light rounded-4 shadow" style="width: 65rem; height: 35rem;">
            <div class="row p-1 g-0 h-100">
                <!-- Image Carousel Section -->
                <div class="col-6 h-100 position-relative">
                    <!-- Container for the logo and text -->
                    <div
                        style="position: absolute; top: 10px; left: 10px; z-index: 10; display: flex; align-items: center;">
                        <img src="{{ asset('assets/img/masp-logo.jpg') }}" alt="logo" width="50" height="50"
                            class="rounded-circle">
                        <h4 class="ms-2 mb-0 fw-bold"><strong>M<b class="text-success">A</b>SP</strong></h4>
                        <!-- Add margin spacing and remove default bottom margin -->
                    </div>

                    <div class="d-flex align-items-center justify-content-center position-absolute w-100 h-100"
                        style="top: 0; z-index: 5;">
                        <h1 class="text-white text-center p-3 rounded fw-bold">Welcome to <br> Municipal Agriculture Service
                            Portal</h1>
                    </div>

                    <div id="carouselExampleIndicators" class="carousel slide carousel-fade h-100" data-bs-ride="carousel"
                        data-bs-interval="6000">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner h-100">
                            <div class="carousel-item active h-100">
                                <img src="{{ asset('assets/img/hero-carousel/img5.jpg') }}"
                                    class="d-block w-100 h-100 rounded-4" style="object-fit: cover;" alt="Image 1">
                            </div>
                            <div class="carousel-item h-100">
                                <img src="{{ asset('assets/img/hero-carousel/img2.jpg') }}"
                                    class="d-block w-100 h-100 rounded-4" style="object-fit: cover;" alt="Image 2">
                            </div>
                            <div class="carousel-item h-100">
                                <img src="{{ asset('assets/img/hero-carousel/img3.jpg') }}"
                                    class="d-block w-100 h-100 rounded-4" style="object-fit: cover;" alt="Image 3">
                            </div>
                        </div>
                    </div>
                </div>




                <!-- Login Form Section -->
                <div class="col-6 d-flex align-items-center">
                    <div class="px-5 w-100">
                        <h3 class="text-center mb-4 fw-semibold">Register your Account</h3>
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="text" class="form-label fw-medium">Name</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                    placeholder="Enter your Full Name" value="{{ old('Name') }}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label fw-medium">Email address</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                    placeholder="Enter your email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label fw-medium">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" placeholder="Enter your password" name="password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label fw-medium">Confirm Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" placeholder="Retype your password" name="password_confirmation"
                                    required>
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Register</button>
                            <div class="text-center mt-3">
                                <p>Already have an account? <a href="{{ route('login') }}"
                                        class="text-decoration-none">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('adminlte_js')
    @yield('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

@stop
