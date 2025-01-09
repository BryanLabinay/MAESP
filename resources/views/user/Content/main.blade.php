<x-user-layout>

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

        <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-item active">
                <img src="{{ asset('assets/img/bg.jpg') }}" alt="">
                <div class="carousel-container">
                    <h2 class="text-center text-uppercase" style="font-weight: 900; font-size: 3.5rem;">Municipal
                        Agriculture Service
                        Portal <br> Aparri</h2>
                </div>
            </div><!-- End Carousel Item -->

            <div class="carousel-item">
                <img src="assets/img/hero_2.jpg" alt="">
                <div class="carousel-container">
                    <h2 class="text-center text-uppercase" style="font-weight: 900; font-size: 3.5rem;">Municipal
                        Agriculture Service
                        Portal <br> Aparri</h2>

                </div>
            </div><!-- End Carousel Item -->

            <div class="carousel-item">
                <img src="assets/img/hero_3.jpg" alt="">
                <div class="carousel-container">
                    <h2 class="text-center text-uppercase" style="font-weight: 900; font-size: 3.5rem;">Municipal
                        Agriculture Service
                        Portal <br> Aparri</h2>

                </div>
            </div><!-- End Carousel Item -->

            <div class="carousel-item">
                <img src="assets/img/hero_4.jpg" alt="">
                <div class="carousel-container">
                    <h2 class="text-center text-uppercase" style="font-weight: 900; font-size: 3.5rem;">Municipal
                        Agriculture Service
                        Portal <br> Aparri</h2>

                </div>
            </div><!-- End Carousel Item -->

            <div class="carousel-item">
                <img src="assets/img/hero_5.jpg" alt="">
                <div class="carousel-container">
                    <h2 class="text-center text-uppercase" style="font-weight: 900; font-size: 3.5rem;">Municipal
                        Agriculture Service
                        Portal <br> Aparri</h2>

                </div>
            </div><!-- End Carousel Item -->

            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

            <ol class="carousel-indicators"></ol>

        </div>

    </section>
    <!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <img src="{{ asset('assets/img/about/about.jpg') }}" alt="Image "
                            class="img-fluid img-overlap" data-aos="zoom-out">
                    </div>
                    <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="content-subtitle text-white opacity-50">Why Choose</h3>
                        <h2 class="content-title mb-4">
                            Municipal<strong>Agriculture</strong> Service Portal
                        </h2>
                        <p class="opacity-50">
                            Reprehenderit, odio laboriosam? Blanditiis quae ullam quasi illum
                            minima nostrum perspiciatis error consequatur sit nulla.
                        </p>

                        <div class="row my-5">
                            <div class="col-lg-12 d-flex align-items-start mb-4">
                                <i class="bi bi-cloud-rain me-4 display-6"></i>
                                <div>
                                    <h4 class="m-0 h5 text-white">Plants needs rain</h4>
                                    <p class="text-white opacity-50">Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>
                            <div class="col-lg-12 d-flex align-items-start mb-4">
                                <i class="bi bi-heart me-4 display-6"></i>
                                <div>
                                    <h4 class="m-0 h5 text-white">Love organic foods</h4>
                                    <p class="text-white opacity-50">Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>
                            <div class="col-lg-12 d-flex align-items-start">
                                <i class="bi bi-shop me-4 display-6"></i>
                                <div>
                                    <h4 class="m-0 h5 text-white">Sell vegies</h4>
                                    <p class="text-white opacity-50">Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /About Section -->

    {{-- NEWS & UPDATES --}}
    <section class="mt-2" style="background-color: #DEBD34;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-6 d-flex justify-content-center">
                    <a href=""
                        class="bg-white p-4 border border-2 shadow-lg rounded text-center text-decoration-none"
                        style="width: 320px;">
                        <div class="d-flex flex-column align-items-center">
                            <img src="{{ asset('assets/img/weather.png') }}" width="60" height="50"
                                alt="">
                            <h5 class="fw-bold text-dark mb-0 mt-3">WEATHER UPDATES</h5>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-6 d-flex justify-content-center">
                    <a href=""
                        class="bg-white p-4 border border-2 shadow-lg rounded text-center text-decoration-none"
                        style="width: 320px;">
                        <div class="d-flex flex-column align-items-center">
                            <img src="{{ asset('assets/img/seminar.png') }}" width="60" height="50"
                                alt="">
                            <h5 class="fw-bold text-dark mb-0 mt-3">SEMINAR</h5>
                        </div>
                    </a>
                </div>


                <div class="col-lg-3 col-6 d-flex justify-content-center">
                    <a href=""
                        class="bg-white p-4 border border-2 shadow-lg rounded text-center text-decoration-none"
                        style="width: 320px;">
                        <div class="d-flex flex-column align-items-center">
                            <img src="{{ asset('assets/img/prices.png') }}" width="60" height="50"
                                alt="">
                            <h5 class="fw-bold text-dark mb-0 mt-3">WEATHER UPDATES</h5>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-6 d-flex justify-content-center">
                    <a href=""
                        class="bg-white p-4 border border-2 shadow-lg rounded text-center text-decoration-none"
                        style="width: 320px;">
                        <div class="d-flex flex-column align-items-center">
                            <img src="{{ asset('assets/img/fertilizer.png') }}" width="60" height="50"
                                alt="">
                            <h5 class="fw-bold text-dark mb-0 mt-1">SEED & FERTILIZER DISTRIBUTION</h5>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </section>

</x-user-layout>
