<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>MUNICIPAL AGRICULTURE SERVICE PORTAL</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ url('assets/img/doa-logo.png') }}" rel="icon">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">

    {{-- Boostrap CDN --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}

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

</head>


<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container-fluid">

            <div class="row justify-content-center align-items-center">
                <div class="col-xl-11 d-flex align-items-center justify-content-between">
                    <a href="index.html" class="logo"><img src="assets/img/masp-logo.jpg" alt=""
                            class="img-fluid rounded-circle me-1"><strong class="text-light">MASP</strong></a>
                    {{-- <h1 class="logo"><a href="index.html">MAESP</a></h1> --}}


                    <nav id="navbar" class="navbar">
                        <ul>
                            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                            <li><a class="nav-link scrollto" href="#about">About</a></li>
                            <li><a class="nav-link scrollto" href="#events">Event</a></li>
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
                            <li><a class="nav-link scrollto" href="#contact">Forum</a></li>
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
            <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

                <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">

                    <div class="carousel-item active" style="background-image: url(assets/img/hero-carousel/img2.jpg)">
                        <div class="carousel-container">
                            <div class="container">
                                <h2 class="animate__animated animate__fadeInDown">MUNICIPAL <strong
                                        class="text-success">AGRICULTURE</strong>
                                    SERVICE PORTAL</h2>
                                <p class="animate__animated animate__fadeInUp">"Supporting local farmers with
                                    sustainable practices, empowering communities with resources, and ensuring fresh,
                                    organic produce. Our portal connects you to essential agricultural services,
                                    fostering growth and resilience for a thriving future."</p>
                                @if (Route::has('login'))
                                    @auth
                                        <a href="{{ url('/home') }}"
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
                                        class="text-success">AGRICULTURE</strong>
                                    SERVICE PORTAL</h2>
                                <p class="animate__animated animate__fadeInUp">"Connecting farmers and residents with
                                    essential agricultural resources, promoting sustainable practices, and fostering
                                    local food production. Together, we strengthen our community’s agricultural
                                    foundation for a healthier, greener tomorrow."</p>
                                @if (Route::has('login'))
                                    @auth
                                        <a href="{{ url('/home') }}"
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
                                        class="text-success">AGRICULTURE</strong>
                                    SERVICE PORTAL</h2>
                                <p class="animate__animated animate__fadeInUp">"Your gateway to agricultural resources
                                    and support. We connect local farmers, promote eco-friendly practices, and ensure
                                    access to fresh, local produce, cultivating a healthier, sustainable community for
                                    generations to come."</p>
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
                                        class="text-success">AGRICULTURE</strong>
                                    SERVICE PORTAL</h2>
                                <p class="animate__animated animate__fadeInUp">"Strengthening local agriculture with
                                    modern solutions, sustainable practices, and accessible resources. Our portal is
                                    dedicated to supporting farmers and promoting a healthier, more resilient community
                                    through sustainable food production."</p>
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
                                        class="text-success">AGRICULTURE</strong>
                                    SERVICE PORTAL</h2>
                                <p class="animate__animated animate__fadeInUp">"Empowering local farmers with tools and
                                    knowledge to promote sustainable agriculture. Our portal provides easy access to
                                    resources, services, and support, building a stronger, self-sufficient agricultural
                                    community for everyone."</p>
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
    </section>
    <!-- End Hero Section -->


    <main id="main">

        <!-- ======= Featured events Section Section ======= -->
        <!-- <section id="featured-events">
                              <div class="container">
                                <div class="row">

                                  <div class="col-lg-4 box">
                                    <i class="bi bi-briefcase"></i>
                                    <h4 class="title"><a href="">Lorem Ipsum Delino</a></h4>
                                    <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                                  </div>

                                  <div class="col-lg-4 box box-bg">
                                    <i class="bi bi-card-checklist"></i>
                                    <h4 class="title"><a href="">Dolor Sitema</a></h4>
                                    <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
                                  </div>

                                  <div class="col-lg-4 box">
                                    <i class="bi bi-binoculars"></i>
                                    <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                                    <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                                  </div>

                                </div>
                              </div>
                            </section> -->

        <!-- ======= About Us Section ======= -->
        <section id="about">
            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h3>About Us</h3>
                    <p>Our portal supports local farmers with resources, sustainable practices, and essential services,
                        fostering a thriving, eco-friendly agricultural community.</p>
                </header>

                <div class="row about-cols">

                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="about-col">
                            <div class="img">
                                <img src="assets/img/hero-carousel/img8.jpg" alt="" class="img-fluid">
                                <div class="icon"><i class="bi bi-bar-chart"></i></div>
                            </div>
                            <h2 class="title"><a href="#">Our Mission</a></h2>
                            <p>
                                To empower local farmers by providing access to essential resources, sustainable
                                practices, and support services, fostering a thriving agricultural community that
                                benefits the entire municipality.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="about-col">
                            <div class="img">
                                <img src="assets/img/hero-carousel/img9.jpg" alt="" class="img-fluid">
                                <div class="icon"><i class="bi bi-brightness-high"></i></div>
                            </div>
                            <h2 class="title"><a href="#">Our Plan</a></h2>
                            <p>
                                To build a resilient, innovative agricultural sector that promotes sustainability,
                                community engagement, and economic growth, ensuring a healthy and prosperous future for
                                our local farming community.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="about-col">
                            <div class="img">
                                <img src="assets/img/hero-carousel/img8.jpg" alt="" class="img-fluid">
                                <div class="icon"><i class="bi bi-calendar4-week"></i></div>
                            </div>
                            <h2 class="title"><a href="#">Our Vision</a></h2>
                            <p>
                                Our plan involves enhancing the platform for easier access, promoting sustainable
                                farming practices, providing comprehensive support services, fostering community
                                engagement, and continuously updating resources based on user.
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= events Section ======= -->
        <section id="events">
            <div class="container" data-aos="fade-up">

                <header class="section-header wow fadeInUp">
                    @foreach ($events as $event)
                        <h3>{{ $event->title }}</h3>


                        <p>{{ $event->description }}</p>
                    @endforeach
                </header>

                {{-- <div class="row">

                    <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bi bi-briefcase"></i></div>
                        <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                        <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias
                            excepturi sint occaecati cupiditate non provident</p>
                    </div>
                    <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="bi bi-card-checklist"></i></div>
                        <h4 class="title"><a href="">Dolor Sitema</a></h4>
                        <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                            ex ea commodo consequat tarad limino ata</p>
                    </div>
                    <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><i class="bi bi-bar-chart"></i></div>
                        <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                        <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                            dolore eu fugiat nulla pariatur</p>
                    </div>
                    <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="bi bi-binoculars"></i></div>
                        <h4 class="title"><a href="">Magni Dolores</a></h4>
                        <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                            officia deserunt mollit anim id est laborum</p>
                    </div>
                    <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><i class="bi bi-brightness-high"></i></div>
                        <h4 class="title"><a href="">Nemo Enim</a></h4>
                        <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui
                            blanditiis praesentium voluptatum deleniti atque</p>
                    </div>
                    <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon"><i class="bi bi-calendar4-week"></i></div>
                        <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
                        <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero
                            tempore, cum soluta nobis est eligendi</p>
                    </div>

                </div> --}}

            </div>
        </section><!-- End events Section -->

        <!-- ======= Call To Action Section ======= -->
        <section id="call-to-action">
            <div class="container text-center" data-aos="zoom-in">
                <h3>Call To Action</h3>
                <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                    anim id est laborum.</p>
                <a class="cta-btn" href="#">Call To Action</a>
            </div>
        </section><!-- End Call To Action Section -->


        <!-- ======= Facts Section ======= -->
        <section id="facts">
            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h3>Facts</h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                </header>

                <div class="row counters">

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Clients</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="421" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Projects</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="1364" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Hours Of Support</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="38" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Hard Workers</p>
                    </div>

                </div>

                <div class="facts-img">
                    <img src="assets/img/img4.jpg" alt="" class="img-fluid">
                </div>

            </div>
        </section><!-- End Facts Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="section-bg">
            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h3 class="section-title">Our Portfolio</h3>
                </header>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class=" col-lg-12">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-app">App</li>
                            <li data-filter=".filter-card">Card</li>
                            <li data-filter=".filter-web">Web</li>
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="assets/img/portfolio/img1.jpg" class="img-fluid" alt="">
                                <a href="assets/img/portfolio/img1.jpg" data-lightbox="portfolio" data-title="App 1"
                                    class="link-preview"><i class="bi bi-plus"></i></a>
                                <a href="portfolio-details.html" class="link-details" title="More Details"><i
                                        class="bi bi-link"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html">App 1</a></h4>
                                <p>App</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="assets/img/portfolio/img2.jpg" class="img-fluid" alt="">
                                <a href="assets/img/portfolio/img2.jpg" class="link-preview portfolio-lightbox"
                                    data-gallery="portfolioGallery" title="Web 3"><i class="bi bi-plus"></i></a>
                                <a href="portfolio-details.html" class="link-details" title="More Details"><i
                                        class="bi bi-link"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html">Web 3</a></h4>
                                <p>Web</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="assets/img/portfolio/img3.jpg" class="img-fluid" alt="">
                                <a href="assets/img/portfolio/img3.jpg" class="link-preview portfolio-lightbox"
                                    data-gallery="portfolioGallery" title="App 2"><i class="bi bi-plus"></i></a>
                                <a href="portfolio-details.html" class="link-details" title="More Details"><i
                                        class="bi bi-link"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html">App 2</a></h4>
                                <p>App</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="assets/img/portfolio/img4.jpg" class="img-fluid" alt="">
                                <a href="assets/img/portfolio/img4.jpg" class="link-preview portfolio-lightbox"
                                    data-gallery="portfolioGallery" title="Card 2"><i class="bi bi-plus"></i></a>
                                <a href="portfolio-details.html" class="link-details" title="More Details"><i
                                        class="bi bi-link"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html">Card 2</a></h4>
                                <p>Card</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="assets/img/portfolio/img5.jpg" class="img-fluid" alt="">
                                <a href="assets/img/portfolio/img5.jpg" class="link-preview portfolio-lightbox"
                                    data-gallery="portfolioGallery" title="Web 2"><i class="bi bi-plus"></i></a>
                                <a href="portfolio-details.html" class="link-details" title="More Details"><i
                                        class="bi bi-link"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html">Web 2</a></h4>
                                <p>Web</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="assets/img/portfolio/img6.jpg" class="img-fluid" alt="">
                                <a href="assets/img/portfolio/img6.jpg" class="link-preview portfolio-lightbox"
                                    data-gallery="portfolioGallery" title="App 3"><i class="bi bi-plus"></i></a>
                                <a href="portfolio-details.html" class="link-details" title="More Details"><i
                                        class="bi bi-link"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html">App 3</a></h4>
                                <p>App</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="assets/img/portfolio/img7.jpg" class="img-fluid" alt="">
                                <a href="assets/img/portfolio/img7.jpg" class="link-preview portfolio-lightbox"
                                    data-gallery="portfolioGallery" title="Card 1"><i class="bi bi-plus"></i></a>
                                <a href="portfolio-details.html" class="link-details" title="More Details"><i
                                        class="bi bi-link"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html">Card 1</a></h4>
                                <p>Card</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="assets/img/portfolio/img8.jpg" class="img-fluid" alt="">
                                <a href="assets/img/portfolio/img8.jpg" class="link-preview portfolio-lightbox"
                                    data-gallery="portfolioGallery" title="Card 3"><i class="bi bi-plus"></i></a>
                                <a href="portfolio-details.html" class="link-details" title="More Details"><i
                                        class="bi bi-link"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html">Card 3</a></h4>
                                <p>Card</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="assets/img/portfolio/img9.jpg" class="img-fluid" alt="">
                                <a href="assets/img/portfolio/img9.jpg" class="link-preview portfolio-lightbox"
                                    data-gallery="portfolioGallery" title="Web 1"><i class="bi bi-plus"></i></a>
                                <a href="portfolio-details.html" class="link-details" title="More Details"><i
                                        class="bi bi-link"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html">Web 1</a></h4>
                                <p>Web</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Testimonials Section ======= -->
        {{-- <section id="testimonials" class="section-bg">
            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h3>Testimonials</h3>
                </header>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonial-1.jpg" class="testimonial-img" alt="">
                                <h3>Saul Goodman</h3>
                                <h4>Ceo &amp; Founder</h4>
                                <p>
                                    <img src="assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                    rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                    risus at semper.
                                    <img src="assets/img/quote-sign-right.png" class="quote-sign-right"
                                        alt="">
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonial-2.jpg" class="testimonial-img" alt="">
                                <h3>Sara Wilsson</h3>
                                <h4>Designer</h4>
                                <p>
                                    <img src="assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                                    Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid
                                    cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet
                                    legam anim culpa.
                                    <img src="assets/img/quote-sign-right.png" class="quote-sign-right"
                                        alt="">
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonial-3.jpg" class="testimonial-img" alt="">
                                <h3>Jena Karlis</h3>
                                <h4>Store Owner</h4>
                                <p>
                                    <img src="assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                                    Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem
                                    veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint
                                    minim.
                                    <img src="assets/img/quote-sign-right.png" class="quote-sign-right"
                                        alt="">
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonial-4.jpg" class="testimonial-img" alt="">
                                <h3>Matt Brandon</h3>
                                <h4>Freelancer</h4>
                                <p>
                                    <img src="assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                                    Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim
                                    fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem
                                    dolore labore illum veniam.
                                    <img src="assets/img/quote-sign-right.png" class="quote-sign-right"
                                        alt="">
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonial-5.jpg" class="testimonial-img" alt="">
                                <h3>John Larson</h3>
                                <h4>Entrepreneur</h4>
                                <p>
                                    <img src="assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                                    Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster
                                    veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam
                                    culpa fore nisi cillum quid.
                                    <img src="assets/img/quote-sign-right.png" class="quote-sign-right"
                                        alt="">
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Testimonials Section --> --}}

        <!-- ======= Team Section ======= -->
        {{-- <section id="team">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h3>Team</h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                </div>

                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <img src="assets/img/team-1.jpg" class="img-fluid" alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>Walter White</h4>
                                    <span>Chief Executive Officer</span>
                                    <div class="social">
                                        <a href=""><i class="bi bi-twitter"></i></a>
                                        <a href=""><i class="bi bi-facebook"></i></a>
                                        <a href=""><i class="bi bi-instagram"></i></a>
                                        <a href=""><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="member" data-aos="fade-up" data-aos-delay="200">
                            <img src="assets/img/team-2.jpg" class="img-fluid" alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>Sarah Jhonson</h4>
                                    <span>Product Manager</span>
                                    <div class="social">
                                        <a href=""><i class="bi bi-twitter"></i></a>
                                        <a href=""><i class="bi bi-facebook"></i></a>
                                        <a href=""><i class="bi bi-instagram"></i></a>
                                        <a href=""><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="member" data-aos="fade-up" data-aos-delay="300">
                            <img src="assets/img/team-3.jpg" class="img-fluid" alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>William Anderson</h4>
                                    <span>CTO</span>
                                    <div class="social">
                                        <a href=""><i class="bi bi-twitter"></i></a>
                                        <a href=""><i class="bi bi-facebook"></i></a>
                                        <a href=""><i class="bi bi-instagram"></i></a>
                                        <a href=""><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="member" data-aos="fade-up" data-aos-delay="400">
                            <img src="assets/img/team-4.jpg" class="img-fluid" alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>Amanda Jepson</h4>
                                    <span>Accountant</span>
                                    <div class="social">
                                        <a href=""><i class="bi bi-twitter"></i></a>
                                        <a href=""><i class="bi bi-facebook"></i></a>
                                        <a href=""><i class="bi bi-instagram"></i></a>
                                        <a href=""><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Team Section --> --}}

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="section-bg">
            <div class="container" data-aos="fade-up">


                <div class="section-header">
                    <h3>Forum</h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form mb-3">
                    <form id="forumForm" action="{{ route('forum.create') }}" method="post">
                        @csrf
                        <div class="row mb-2">
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Your Name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="description" rows="5" placeholder="Message" required></textarea>
                        </div>
                        <div class="my-3">
                            <div id="loading" class="loading" style="display: none;">Loading</div>
                            <div id="error-message" class="error-message" style="display: none;"></div>
                            <div id="success-message" class="sent-message" style="display: none;">Your message has
                                been sent. Thank you!</div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Send Message</button>
                        </div>
                    </form>
                </div>

                <div class="row p-3" style="max-height: 500px; overflow-y: auto;">
                    <div class="col-12">
                        <div class="row bg-white shadow-sm rounded-2 g-3">
                            @foreach ($forums as $forum)
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="card h-100" data-bs-toggle="modal"
                                        data-bs-target="#forumModal{{ $forum->id }}" style="cursor: pointer;">
                                        <div class="card-body">
                                            <!-- Forum Title -->
                                            <h6 class="card-title">{{ $forum->name }}</h6>

                                            <!-- Forum Subject -->
                                            <p class="card-subtitle text-muted mb-2">{{ $forum->subject }}</p>

                                            <!-- Forum Description -->
                                            <p class="card-text">{{ Str::limit($forum->description, 100, '...') }}</p>

                                            <!-- Buttons -->
                                            <div class="d-flex justify-content-between">
                                                <!-- Like Button -->
                                                <button type="button" class="btn btn-outline-primary btn-sm"
                                                    onclick="event.stopPropagation();">
                                                    <i class="bi bi-hand-thumbs-up"></i> Like
                                                </button>

                                                <!-- Comment Button -->
                                                <button type="button" class="btn btn-outline-secondary btn-sm"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#commentSection{{ $forum->id }}"
                                                    onclick="event.stopPropagation();">
                                                    <i class="bi bi-chat"></i> Comment
                                                </button>
                                            </div>

                                            <!-- Comment Section (Collapsible) -->
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="forumModal{{ $forum->id }}" tabindex="-1"
                                    aria-labelledby="forumModalLabel{{ $forum->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="forumModalLabel{{ $forum->id }}">
                                                    {{ $forum->name }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Subject:</strong> {{ $forum->subject }}</p>
                                                <p><strong>Description:</strong> {{ $forum->description }}</p>

                                                <!-- Display Reactions for this Forum -->
                                                <ul>
                                                    @forelse($forum->reactions as $reaction)
                                                        <li>
                                                            Anonymous: {{ $reaction->comment_text }} <br>
                                                            {{-- Reaction Type: {{ $reaction->reaction_type }} <br>
                                                    Created At: {{ $reaction->created_at->format('Y-m-d H:i:s') }} --}}
                                                        </li>
                                                    @empty
                                                        <li>No reactions found.</li>
                                                    @endforelse
                                                </ul>
                                            </div>
                                            <div class="p-4">
                                                <div class="collapse mt-3" id="commentSection{{ $forum->id }}">
                                                    <form method="POST" action="{{ route('reactions.store') }}">
                                                        @csrf
                                                        <input type="hidden" name="forum_id"
                                                            value="{{ $forum->id }}" />

                                                        <div class="mb-2 d-flex">
                                                            <input type="text" name="comment_text"
                                                                class="form-control form-control-sm"
                                                                placeholder="Write a comment" required />

                                                            <button type="submit"
                                                                class="btn btn-primary btn-sm">Post</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                <script>
                    document.getElementById('forumForm').addEventListener('submit', function(e) {
                        e.preventDefault();

                        // Show loading message
                        document.getElementById('loading').style.display = 'block';

                        // Clear previous error and success messages
                        document.getElementById('error-message').style.display = 'none';
                        document.getElementById('success-message').style.display = 'none';

                        var formData = new FormData(this);

                        // Submit form via AJAX
                        fetch('{{ route('forum.create') }}', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                },
                                body: formData
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Hide loading
                                    document.getElementById('loading').style.display = 'none';

                                    // Show success message
                                    document.getElementById('success-message').style.display = 'block';

                                    // Optionally, refresh the page after submission
                                    setTimeout(function() {
                                        window.location.reload();
                                    }, 1000); // Refresh page after 1 second
                                } else {
                                    throw data.message || 'An error occurred';
                                }
                            })
                            .catch(error => {
                                // Hide loading
                                document.getElementById('loading').style.display = 'none';

                                // Show error message
                                document.getElementById('error-message').innerText = error;
                                document.getElementById('error-message').style.display = 'block';
                            });
                    });
                </script>

            </div>
        </section><!-- End Contact Section -->


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-info">
                        <h3>MASP</h3>
                        <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita
                            valies darta donna mare fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet
                            proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">events</a></li>
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
                            illum dolore legam minim quorum culpa amet magna export quem marada parida nodela caramase
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
                &copy; Copyright <strong>Municipal Agriculture Service Portal</strong>. All Rights Reserved
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    {{--  <!-- <div id="preloader"></div>   --}}

    <!-- Vendor JS Files -->
    <script src="{{ url('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ url('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ url('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ url('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ url('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ url('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ url('assets/js/main.js') }}"></script>

    <!-- Bootstrap JS (with Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>
