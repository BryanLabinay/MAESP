<nav class="sb-topnav navbar navbar-expand navbar-dark bg-white shadow-sm py-2">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-0 bg-success py-2" href="#"><img src="{{ asset('assets/img/masp-logo.jpg') }}"
            alt="Masp Logo" width="40" height="40" class="rounded-circle me-1">Barangay Office</a>
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
        @php
            $unreadCount = Auth::user()->notifications->whereNull('read_at')->count();
        @endphp

        <li class="nav-item dropdown">
            <a id="navbarDropdownMenuLink1" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false" class="nav-link messages-toggle position-relative">
                <i style="font-size: 19px; color:black" class="fa-solid fa-bell"></i>
                <span id="notificationBadge"
                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger
    @if ($unreadCount === 0) disabled" aria-disabled="true" style="pointer-events: none; opacity: 0;" @endif">
                    {{ $unreadCount }}
                </span>
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink1"
                style="max-height: 300px; overflow-y: auto;">
                @php
                    $notifications = Auth::user()->notifications ?? collect();
                    $unreadNotifications = $notifications->where('read_at', null);
                    $readNotifications = $notifications->where('read_at', '!=', null);
                @endphp

                {{-- Unread Notifications --}}
                @if ($unreadNotifications->isNotEmpty())
                    <div class="dropdown-header text-center">
                        <strong>Unread Notifications</strong>
                    </div>
                    @foreach ($unreadNotifications as $notification)
                        <a class="dropdown-item notification-item bg-warning text-dark" href="javascript:void(0)"
                            onclick="markAsRead('{{ $notification->id }}')">
                            <i
                                class="fas fa-exclamation-circle me-1 text-warning"></i>{{ $notification->data['message'] }}
                        </a>
                    @endforeach
                @endif

                {{-- Read Notifications --}}
                @if ($readNotifications->isNotEmpty())
                    @foreach ($readNotifications as $notification)
                        <a class="dropdown-item notification-item bg-light text-muted" href="# ">
                            <i class="fas fa-check-circle me-1 text-success"></i>{{ $notification->data['message'] }}
                        </a>
                    @endforeach
                @endif

                {{-- Empty State --}}
                @if ($notifications->isEmpty())
                    <a class="dropdown-item text-center text-muted px-5 py-0" href="#">No
                        Notifications</a>
                @endif
            </div>
        </li>


        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user fa-fw fa-lg text-black"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                <li><a class="dropdown-item" href="#!"><i class="fa-solid fa-user me-1"></i>Profile</a></li>
                <li><a class="dropdown-item" href="#!"><i class="fa-solid fa-gear me-1"></i>Setting</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="dropdown-item text-danger" type="submit">
                            <i class="fa-solid fa-power-off me-1"></i>Logout
                        </button>
                    </form>
                </li>
            </ul>
        </li>

    </ul>
</nav>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Ensure dropdown opens on click
    $(document).ready(function() {
        $('#navbarDropdown').on('click', function(e) {
            e.preventDefault();
            $(this).next('.dropdown-menu').toggleClass('show');
        });
    });
</script>
<script>
    function markAsRead(notificationId) {
        fetch("{{ url('/barangay/notifications') }}/" + notificationId + "/read", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.querySelector(`[onclick="markAsRead('${notificationId}')"]`)
                        ?.classList.remove('bg-warning', 'text-dark');
                    document.querySelector(`[onclick="markAsRead('${notificationId}')"]`)
                        ?.classList.add('bg-light', 'text-muted');

                    let notificationBadge = document.getElementById('notificationBadge');
                    if (notificationBadge) {
                        let unreadCount = parseInt(notificationBadge.textContent, 10);
                        notificationBadge.textContent = Math.max(0, unreadCount - 1);

                        if (unreadCount - 1 === 0) {
                            notificationBadge.style.opacity = '0';
                        }
                    }
                    location.reload();
                } else {
                    console.error(data.message);
                }
            })
            .catch(error => {
                console.error('Error marking notification as read:', error);
            });
    }
</script>
