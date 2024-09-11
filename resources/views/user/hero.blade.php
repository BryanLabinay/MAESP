<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <div class="carousel-item active" style="background-image: url(assets/img/hero-carousel/img2.jpg)">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">MUNICIPAL <strong
                                    class="text-success">AGRICULTURE</strong> EXTENSION
                                SERVICE PORTAL</h2>
                            <p class="animate__animated animate__fadeInUp">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
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
                            <p class="animate__animated animate__fadeInUp">Nam libero tempore, cum soluta nobis est
                                eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere
                                possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem
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
                            <p class="animate__animated animate__fadeInUp">Beatae vitae dicta sunt explicabo. Nemo
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
                            <p class="animate__animated animate__fadeInUp">Neque porro quisquam est, qui dolorem
                                ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius
                                modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim
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
                            <p class="animate__animated animate__fadeInUp">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
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
</section>
