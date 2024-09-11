<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ url('assets/img/doa-logo.png') }}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!--  Main CSS File -->
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<body>
    <div id="app">
        <header id="header" class="fixed-top d-flex align-items-center header-transparent">
            <div class="container-fluid">

                <div class="row justify-content-center align-items-center">
                    <div class="col-xl-11 d-flex align-items-center justify-content-between">
                        <a href="index.html" class="logo"><img src="assets/img/doa-logo.png" alt=""
                                class="img-fluid me-1"><strong class="text-light">MAESP</strong></a>
                        {{-- <h1 class="logo"><a href="index.html">MAESP</a></h1> --}}


                        <nav id="navbar" class="navbar">
                            <ul>
                                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                                <li><a class="nav-link scrollto" href="{{ route('about') }}">About</a></li>
                                <li><a class="nav-link scrollto" href="#services">Services</a></li>
                                <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
                                <li><a class="nav-link scrollto" href="#team">Team</a></li>
                                <li><a class="nav-link  " href="blog.html">Blog</a></li>
                                <li class="dropdown"><a href="#"><span>Drop Down</span> <i
                                            class="bi bi-chevron-down"></i></a>
                                    <ul>
                                        <li><a href="#">Drop Down 1</a></li>
                                        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                                                    class="bi bi-chevron-right"></i></a>
                                            <ul>
                                                <li><a href="#">Deep Drop Down 1</a></li>
                                                <li><a href="#">Deep Drop Down 2</a></li>
                                                <li><a href="#">Deep Drop Down 3</a></li>
                                                <li><a href="#">Deep Drop Down 4</a></li>
                                                <li><a href="#">Deep Drop Down 5</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Drop Down 2</a></li>
                                        <li><a href="#">Drop Down 3</a></li>
                                        <li><a href="#">Drop Down 4</a></li>
                                    </ul>
                                </li>
                                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                            </ul>
                            <i class="bi bi-list mobile-nav-toggle"></i>
                        </nav><!-- .navbar -->
                    </div>
                </div>

            </div>
        </header><!-- End Header -->

        <!-- ======= hero Section ======= -->
        <section id="hero">
            <div class="hero-container">
                <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel"
                    data-bs-interval="5000">

                    <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

                    <div class="carousel-inner" role="listbox">

                        <div class="carousel-item active"
                            style="background-image: url(assets/img/hero-carousel/img2.jpg)">
                            <div class="carousel-container">
                                <div class="container">
                                    <h2 class="animate__animated animate__fadeInDown">MUNICIPAL <strong
                                            class="text-success">AGRICULTURE</strong> EXTENSION
                                        SERVICE PORTAL</h2>
                                    <p class="animate__animated animate__fadeInUp">Lorem ipsum dolor sit amet,
                                        consectetur
                                        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                        aliqua.
                                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                        aliquip
                                        ex ea commodo consequat.</p>
                                    @if (Route::has('login'))
                                        @auth
                                            <a href="{{ url('/dashboard') }}"
                                                class="btn-get-started scrollto animate__animated animate__fadeInUp">Dashboard</a>
                                        @else
                                            <a href="{{ route('login') }}"
                                                class="btn-get-started scrollto animate__animated animate__fadeInUp">
                                                Get
                                                Started
                                            </a>
                                        @endauth
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/img1.jpg)">
                            <div class="carousel-container">
                                <div class="container">
                                    <h2 class="animate__animated animate__fadeInDown">MUNICIPAL <strong
                                            class="text-success">AGRICULTURE</strong> EXTENSION
                                        SERVICE PORTAL</h2>
                                    <p class="animate__animated animate__fadeInUp">Nam libero tempore, cum soluta nobis
                                        est
                                        eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere
                                        possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus
                                        autem
                                        quibusdam et aut officiis debitis aut.</p>
                                    @if (Route::has('login'))
                                        @auth
                                            <a href="{{ url('/dashboard') }}"
                                                class="btn-get-started scrollto animate__animated animate__fadeInUp">Dashboard</a>
                                        @else
                                            <a href="{{ route('login') }}"
                                                class="btn-get-started scrollto animate__animated animate__fadeInUp">
                                                Get
                                                Started
                                            </a>
                                        @endauth
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/img3.jpg)">
                            <div class="carousel-container">
                                <div class="container">
                                    <h2 class="animate__animated animate__fadeInDown">MUNICIPAL <strong
                                            class="text-success">AGRICULTURE</strong> EXTENSION
                                        SERVICE PORTAL</h2>
                                    <p class="animate__animated animate__fadeInUp">Beatae vitae dicta sunt explicabo.
                                        Nemo
                                        enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                        consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt omnis iste
                                        natus error sit voluptatem accusantium.</p>
                                    @if (Route::has('login'))
                                        @auth
                                            <a href="{{ url('/dashboard') }}"
                                                class="btn-get-started scrollto animate__animated animate__fadeInUp">Dashboard</a>
                                        @else
                                            <a href="{{ route('login') }}"
                                                class="btn-get-started scrollto animate__animated animate__fadeInUp">
                                                Get
                                                Started
                                            </a>
                                        @endauth
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/img4.jpg)">
                            <div class="carousel-container">
                                <div class="container">
                                    <h2 class="animate__animated animate__fadeInDown">MUNICIPAL <strong
                                            class="text-success">AGRICULTURE</strong> EXTENSION
                                        SERVICE PORTAL</h2>
                                    <p class="animate__animated animate__fadeInUp">Neque porro quisquam est, qui
                                        dolorem
                                        ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam
                                        eius
                                        modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut
                                        enim
                                        ad minima veniam, quis nostrum.</p>
                                    @if (Route::has('login'))
                                        @auth
                                            <a href="{{ url('/dashboard') }}"
                                                class="btn-get-started scrollto animate__animated animate__fadeInUp">Dashboard</a>
                                        @else
                                            <a href="{{ route('login') }}"
                                                class="btn-get-started scrollto animate__animated animate__fadeInUp">
                                                Get
                                                Started
                                            </a>
                                        @endauth
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/img7.jpg)">
                            <div class="carousel-container">
                                <div class="container">
                                    <h2 class="animate__animated animate__fadeInDown">MUNICIPAL <strong
                                            class="text-success">AGRICULTURE</strong> EXTENSION
                                        SERVICE PORTAL</h2>
                                    <p class="animate__animated animate__fadeInUp">Lorem ipsum dolor sit amet,
                                        consectetur
                                        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                        aliqua.
                                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                        aliquip
                                        ex ea commodo consequat.</p>
                                    @if (Route::has('login'))
                                        @auth
                                            <a href="{{ url('/dashboard') }}"
                                                class="btn-get-started scrollto animate__animated animate__fadeInUp">Dashboard</a>
                                        @else
                                            <a href="{{ route('login') }}"
                                                class="btn-get-started scrollto animate__animated animate__fadeInUp">
                                                Get
                                                Started
                                            </a>
                                        @endauth
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>

                    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                    </a>

                    <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                    </a>

                </div>
            </div>
        </section><!-- End Hero Section -->

        <main class="py-4">
            {{ $slot }}
        </main>

        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-md-6 footer-info">
                            <h3>MAESP</h3>
                            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna
                                derita
                                valies darta donna mare fermentum iaculis eu non diam phasellus. Scelerisque felis
                                imperdiet
                                proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
                        </div>

                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Useful Links</h4>
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                                <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
                                <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
                                <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
                                <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-md-6 footer-contact">
                            <h4>Contact Us</h4>
                            <p>
                                Toran, <br>
                                Aparri,<br>
                                Cagayan <br>
                                <strong>Phone:</strong> +1 5589 55488 55<br>
                                <strong>Email:</strong> info@example.com<br>
                            </p>

                            <div class="social-links">
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div>

                        </div>

                        <div class="col-lg-3 col-md-6 footer-newsletter">
                            <h4>Our Newsletter</h4>
                            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam
                                illum dolore legam minim quorum culpa amet magna export quem marada parida nodela
                                caramase
                                seza.</p>
                            <form action="" method="post">
                                <input type="email" name="email"><input type="submit" value="Subscribe">
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong>Municipal Agriculture Extension Service Portal</strong>. All Rights
                    Reserved
                </div>
                <div class="credits">
                    Designed by <a href="https://bootstrapmade.com/">MAESP</a>
                </div>
            </div>
        </footer><!-- End Footer -->

    </div>
</body>

</html>
