<nav class="sb-topnav navbar navbar-expand navbar-dark bg-white shadow-sm py-2">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-0 bg-success py-2" href="#"><img src="{{ asset('assets/img/masp-logo.jpg') }}"
            alt="Masp Logo" width="40" height="40" class="rounded-circle me-1">Agriculture Office</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars text-dark"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        {{-- <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div> --}}
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw fa-lg text-black"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!"><i class="fa-solid fa-user me-1"></i>Profile</a></li>
                <li><a class="dropdown-item" href="#!"><i class="fa-solid fa-gear me-1"></i>Setting</a></li>
                {{-- <li>
                    <hr class="dropdown-divider bg-danger" />
                </li> --}}
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="dropdown-item text-danger" type="submit"><i
                                class="fa-solid fa-power-off me-1"></i>Logout</button>
                    </form>
                </li>

            </ul>
        </li>
    </ul>
</nav>
