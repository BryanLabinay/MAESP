<x-app-layout>
    @section('css')
        {{-- Bootstrap CDN --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        {{-- Google Fonts --}}
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
            rel="stylesheet">
        <style>
            body {
                font-family: 'Poppins';
            }
        </style>
    @stop

    @section('content_header')
        <h5 class="fw-semibold text-md">Portfolio</h5>
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
                        title: 'Portfolio added!'
                    })
                })()
            </script>
        @endif

        @if (session('update'))
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
                        title: 'Updated Portfolio!'
                    })
                })()
            </script>
        @endif
    @stop

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 col-12 d-flex justify-content-center mb-2">
                    <div class="p-2 text-black px-3 rounded-1 border shadow-sm" style="width: 650px; height: 460px">
                        <h5 class="mb-3 fw-bold  px-1 py-1 rounded-1 text-center bg-secondary">Upload Portfolio</h5>
                        <form action="{{ route('form.submit') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    placeholder="Enter title">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="5" placeholder="Write the description"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" id="image">
                            </div>

                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary px-5 ">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-5 col-12 p-0">
                    <div class="bg-white bg-opacity-25 p-2 rounded-1 position-relative border shadow-sm"
                        style="height: 460px">
                        <div class="bg-secondary bg-opacity-25 p-0 rounded-1 text-black">
                            <h5 class="mb-3 fw-bold bg-secondary px-1 py-1 rounded-1 text-center">
                                <span class="">List</span>
                            </h5>
                        </div>
                        <hr class="mt-0 text-black">

                        <!-- Content -->
                        <div>
                            @forelse ($portfolios as $data)
                                <div class="clickable-container position-relative mb-1 shadow-sm">
                                    <!-- Trigger Element -->
                                    <div class="stretched-link text-decoration-none" data-bs-toggle="modal"
                                        data-bs-target="#portfolioModal{{ $data->id }}">
                                        <div class="d-flex align-items-center bg-white bg-opacity rounded-1 px-3">
                                            <div class="me-3">
                                                @if ($data->image)
                                                    <img src="{{ asset('images/' . $data->image) }}"
                                                        class="border border-1 border-secondary object-fit" height="50"
                                                        width="50" alt="{{ $data->title }}"
                                                        style="border-radius:50%; object-fit: cover;">
                                                @else
                                                    <img src="{{ asset('uploads/service/default.png') }}" height="50"
                                                        width="50" alt="Default Image"
                                                        style="border-radius:50%; object-fit: cover;">
                                                @endif
                                            </div>
                                            <div class="list-group">
                                                <div class="p-2">
                                                    <div class="flex-grow-1">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h6 class="mb-0 text-dark fw-bold">{{ $data->title }}</h6>
                                                            </div>
                                                            <div class="col-12">
                                                                <p class="mb-0 text-muted">
                                                                    {{ \Illuminate\Support\Str::limit($data->description, 50) }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="portfolioModal{{ $data->id }}" tabindex="-1"
                                        aria-labelledby="portfolioModalLabel{{ $data->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="portfolioModalLabel{{ $data->id }}">
                                                        {{ $data->title }}
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Image -->
                                                    @if ($data->image)
                                                        <img src="{{ asset('images/' . $data->image) }}"
                                                            class="img-fluid rounded mb-3 mx-auto d-block"
                                                            style="width: 100%; max-height: 400px; object-fit: cover;"
                                                            alt="{{ $data->title }}">
                                                    @else
                                                        <img src="{{ asset('uploads/service/default.png') }}"
                                                            class="img-fluid rounded mb-3 mx-auto d-block"
                                                            style="width: 100%; max-height: 400px; object-fit: cover;"
                                                            alt="Default Image">
                                                    @endif

                                                    <!-- Description -->
                                                    <p>{{ $data->description }}</p>

                                                    <!-- Additional Details (Optional) -->
                                                    <div>
                                                        <small class="text-muted">Created on:
                                                            {{ $data->created_at->format('M d, Y') }}</small>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <a href="{{ route('portfolio.edit', $data->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @empty
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-5 col-12">
                                        <div class="bg-secondary bg-opacity-25 rounded-1 shadow-sm">
                                            <h5 class="mb-3 fw-bold bg-white px-1 py-1 rounded-1 text-center"
                                                style="color:#012970;">
                                                <span class="text-danger">No Content</span>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforelse
                        </div>

                        <!-- Pagination Links -->
                        <div
                            class="d-flex justify-content-center align-items-center position-absolute bottom-0 start-0 w-100">
                            {{ $portfolios->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>

                {{-- <!-- Portfolio Table Column -->
                <div class="col-md-5">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title text-center mb-4">Created Portfolios</h4>
                            <table class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($portfolios as $portfolio)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $portfolio->title }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($portfolio->description, 50) }}</td>
                                            <td>
                                                @if ($portfolio->image)
                                                    <img src="{{ asset('images/' . $portfolio->image) }}"
                                                        alt="Portfolio Image" class="img-thumbnail"
                                                        style="width: 100px; height: 70px;">
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>
                                                <!-- Edit Button -->
                                                <a href="{{ route('portfolio.edit', $portfolio->id) }}"
                                                    class="btn btn-sm btn-info">Edit</a>

                                                <!-- Delete Button -->
                                                <form action="{{ route('portfolio.destroy', $portfolio->id) }}"
                                                    method="post" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this portfolio?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No Portfolios Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    @stop

    @section('js')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @endsection
</x-app-layout>
