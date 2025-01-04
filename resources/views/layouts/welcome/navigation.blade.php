<header id="header" class="header d-flex align-items-center position-sticky top-0 p-1 body" style="z-index: 1000;">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
        <a href="index.html" class="d-flex align-items-center mt-1">
            <!-- Image logo on the left -->
            <img src="assets/img/masp-logo.jpg" alt="AgriCulture" style="width: 60px; height: 60px;">
            <h3 class="mt-2 fw-bold text-success">MASP</h3>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#index.html" class="active">Home</a></li>
                <li><a href="#about.html">About Us</a></li>
                {{-- <li><a href="#about.html">Services</a></li> --}}
                {{-- <li><a href="services.html">Our Services</a></li> --}}
                <li class="dropdown"><a href="#"><span>Services</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        @php
                            $services = \App\Models\Service::all();
                        @endphp
                        @if ($services->isEmpty())
                            <li><a href="#">No services available</a></li>
                        @else
                            @foreach ($services as $service)
                                <li><a
                                        href="{{ route('user.service', ['id' => $service->id]) }}">{{ $service->service_name }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </li>


                <li class="dropdown"><a href="#"><span>Media Resources</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        @php
                            $mediatitle = \App\Models\MediaTitle::all();
                        @endphp
                        @if ($mediatitle->isEmpty())
                            <li><a href="#">No media resources available</a></li>
                        @else
                            @foreach ($mediatitle as $media)
                                <li><a
                                        href="{{ route('user.media', ['id' => $media->id]) }}">{{ $media->media_name }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </li>


                <li><a href="blog.html">Portfolio</a></li>
                <li class="dropdown"><a href="#"><span>Transparency</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="#">Dropdown 1</a></li>
                    </ul>
                </li>
                <li><a href="contact.html">Contact</a></li>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}"
                            class="btn btn-success py-1 text-uppercase fw-bold text-light">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="btn"><i
                                class="fa-solid fa-lock text-success fa-xl"></i></a>
                    @endauth
                @endif
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    </div>
</header>
