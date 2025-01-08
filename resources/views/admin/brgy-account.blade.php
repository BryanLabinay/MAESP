<x-app-layout>
    @section('css')
        {{-- Boostrap CDN --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        {{-- Google Fonts --}}
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">

        {{-- Datatable link --}}
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

        <style>
            body {
                font-family: 'Poppins';
            }
        </style>
    @stop

    @section('content_header')
        <h5 class="fw-semibold text-md">Barangay Account</h5>
        <hr class="mt-0">

        @if (session('success'))
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    iconColor: 'white',
                    customClass: {
                        popup: 'colored-toast',
                    },
                    showConfirmButton: false,
                    timer: 3000,
                    timerPr0ogressBar: true,
                });
                (async () => {
                    await Toast.fire({
                        icon: 'success',
                        title: 'Barangay account created successfully!'
                    })
                })()
            </script>
        @endif
    @stop

    @section('content')
        <div class="container-fluid">
            <div class="">
                <div class="row p-1 g-0 h-100">
                    <!-- Image Carousel Section -->
                    <!-- Register Form Section -->
                    <div class="col-md-6 col-12 d-flex align-items-center">
                        <div class="card w-100">
                            <div class="card-body px-2">
                                <h6 class="text-center mb-2 fw-semibold bg-sucess px-2">Create Barangay Account</h6>
                                <form action="{{ route('barangays.account') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="usertype" value="barangay">
                                    <div class="mb-3">
                                        <label for="text" class="form-label fw-medium">Barangay Name</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror" id="name"
                                            placeholder="Enter your Full Name" value="{{ old('name') }}" required>
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
                                        <label for="password_confirmation" class="form-label fw-medium">Confirm
                                            Password</label>
                                        <input type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            id="password_confirmation" placeholder="Retype your password"
                                            name="password_confirmation" required>
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Register Account</button>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-5 col-12 ms-4">
                        <div class="card bg-success bg-opacity-75 text-dark rounded-1">
                            <div class="card-header text-center p-2">
                                <h5 class="mb-0">Barangay Account List</h5>
                            </div>
                            <div class="card-body p-0 mt-2 px-2">
                                <table class="table table-striped table-bordered mb-0" id="mediaTable">
                                    <thead class="table-success">
                                        <tr>
                                            <th scope="col">Barangay Name</th>
                                            <th scope="col">Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($barangay as $data)
                                            <tr>
                                                <td class="text-uppercase">{{ $data->name }}</td>
                                                <td>{{ $data->email }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2" class="text-center">No Barangay Account</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @stop

    @section('adminlte_js')
        @yield('js')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Include jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Include DataTables JS -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

        <!-- Initialize DataTable -->
        <script>
            $(document).ready(function() {
                $('#mediaTable').DataTable();
            });
        </script>
    @stop
</x-app-layout>
