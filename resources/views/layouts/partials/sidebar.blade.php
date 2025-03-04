<nav class="sb-sidenav accordion sb-sidenav-white text-dark shadow-lg" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">NAVIGATION</div>
            <a class="nav-link text-dark {{ Request::is('home') ? 'active' : '' }}" href="{{ url('/home') }}"
                style="{{ Request::is('home') ? 'color: blue; background-color: #A2CA71;' : '' }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                Dashboard
            </a>


            <div class="sb-sidenav-menu-heading">FARMERS</div>
            {{-- Add Farmers --}}
            <a class="nav-link text-dark {{ Request::is('barangay/add-farmers') ? 'active' : '' }}"
                href="{{ url('/barangay/add-farmers') }}"
                style="{{ Request::is('barangay/add-farmers') ? 'color: blue; background-color: #A2CA71;' : '' }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-user-plus"></i></div>
                Add Farmers
            </a>

            {{-- Farmer List --}}
            <a class="nav-link text-dark {{ Request::is('barangay/list-farmers') ? 'active' : '' }}"
                href="{{ url('/barangay/list-farmers') }}"
                style="{{ Request::is('barangay/list-farmers') ? 'color: blue; background-color: #A2CA71;' : '' }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                Farmers List
            </a>

            {{-- Cropping Reports --}}
            <a class="nav-link text-dark {{ Request::is('barangay/cropping-reports') ? 'active' : '' }}"
                href="{{ url('/barangay/cropping-reports') }}"
                style="{{ Request::is('barangay/cropping-reports') ? 'color: blue; background-color: #A2CA71;' : '' }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-file-pen"></i></div>
                Cropping Reports
            </a>
            {{-- <a class="nav-link text-dark {{ Request::is('barangay/cropping-list') ? 'active' : '' }}"
                href="{{ url('/barangay/cropping-list') }}"
                style="{{ Request::is('barangay/cropping-list') ? 'color: blue; background-color: #A2CA71;' : '' }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                Cropping List
            </a> --}}



            <a class="nav-link text-dark {{ Request::is('barangay/list-cropping reports') ? 'active' : '' }}"
                href="{{ url('/barangay/list-cropping reports') }}"
                style="{{ Request::is('barangay/list-cropping reports') ? 'color: blue; background-color: #A2CA71;' : '' }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></div>
                Crop Assessment
            </a>

            <a class="nav-link text-dark {{ Request::is('barangay/send-reports') ? 'active' : '' }}"
                href="{{ url('barangay/send-reports') }}"
                style="{{ Request::is('barangay/send-reports') ? 'color: blue; background-color: #A2CA71;' : '' }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-paper-plane"></i></div>
                Send Reports
            </a>

            <div class="sb-sidenav-menu-heading">Other</div>

            <a class="nav-link collapsed text-dark" href="#" data-bs-toggle="collapse"
                data-bs-target="#ServicecollapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-screwdriver-wrench"></i></div>
                Services
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="ServicecollapseLayouts" aria-labelledby="headingOne"
                data-bs-parent="#sidenavAccordion">
                @php
                    $services = \App\Models\Service::all();
                @endphp

                <nav class="sb-sidenav-menu-nested nav">
                    @forelse ($services as $service)
                        <a class="nav-link"
                            href="{{ route('brgy.service', ['id' => $service->id]) }}">{{ $service->service_name }}</a>
                    @empty
                        <span class="nav-link text-muted">No service</span>
                    @endforelse
                </nav>
            </div>

            <a class="nav-link collapsed text-dark" href="#" data-bs-toggle="collapse"
                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-newspaper"></i></div>
                Media Resources
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                @php
                    $mediatitle = \App\Models\MediaTitle::all();
                @endphp

                <nav class="sb-sidenav-menu-nested nav">
                    @forelse ($mediatitle as $media)
                        <a class="nav-link"
                            href="{{ route('brgy.media', ['id' => $media->id]) }}">{{ $media->media_name }}</a>
                    @empty
                        <span class="nav-link text-muted">No Media Resources</span>
                    @endforelse
                </nav>
            </div>

            <a class="nav-link collapsed text-dark" href="#" data-bs-toggle="collapse"
                data-bs-target="#transparencyLayouts" aria-expanded="false" aria-controls="transparencyLayouts">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-earth-asia"></i></div>
                Transparency
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="transparencyLayouts" aria-labelledby="headingOne"
                data-bs-parent="#sidenavAccordion">
                @php
                    $title = \App\Models\TransparencyTitle::all();
                @endphp

                <nav class="sb-sidenav-menu-nested nav">
                    @forelse ($title as $transparency)
                        <a class="nav-link"
                            href="{{ route('brgy.transparency', ['id' => $transparency->id]) }}">{{ $transparency->transparency_name }}</a>
                    @empty
                        <span class="nav-link text-muted">No Transparency</span>
                    @endforelse
                </nav>
            </div>

            <a class="nav-link collapsed text-dark" href="#" data-bs-toggle="collapse"
                data-bs-target="#newsLayouts" aria-expanded="false" aria-controls="newsLayouts">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-newspaper"></i></div>
                News and Update
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="newsLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                @php
                    $title = \App\Models\NewsTitle::all();
                @endphp

                <nav class="sb-sidenav-menu-nested nav">
                    @forelse ($title as $news)
                        <a class="nav-link"
                            href="{{ route('brgy.news', ['id' => $news->id]) }}">{{ $news->news_name }}</a>
                    @empty
                        <span class="nav-link text-muted">No News and Update</span>
                    @endforelse
                </nav>
            </div>

            <a class="nav-link text-dark" href="{{ url('/barangay/Activity-log') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-clock-rotate-left"></i></div>
                Activity Log
            </a>
            {{-- <a class="nav-link text-dark" href="#">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Tables
            </a> --}}
            {{--
            <a class="nav-link collapsed text-dark" href="#" data-bs-toggle="collapse"
                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-user-plus"></i></div>
                Add Farmers
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="#">Static Navigation</a>
                    <a class="nav-link" href="#">Light Sidenav</a>
                </nav>
            </div> --}}

            {{-- <a class="nav-link collapsed text-dark" href="#" data-bs-toggle="collapse"
            data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
            Pages
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                    data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                    Authentication
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordionPages">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="#">Login</a>
                        <a class="nav-link" href="#">Register</a>
                        <a class="nav-link" href="#">Forgot Password</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                    data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                    Error
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordionPages">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="#">401 Page</a>
                        <a class="nav-link" href="#">404 Page</a>
                        <a class="nav-link" href="#">500 Page</a>
                    </nav>
                </div>
            </nav>
        </div> --}}
        </div>
    </div>
    {{-- <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Barangay
    </div> --}}
</nav>
