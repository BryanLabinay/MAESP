<x-app-layout>
    @section('css')
        {{-- Boostrap CDN --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        {{-- Google Fonts --}}
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
        <style>
            body {
                font-family: 'Poppins';
            }
        </style>

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
                        title: 'Service Content added!'
                    })
                })()
            </script>
        @endif
        @if (session('destroy'))
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
                        icon: 'warning',
                        title: 'Service Content Deleted!'
                    })
                })()
            </script>
        @endif
    @stop

    @section('content_header')
        <h5 class="fw-semibold text-md"><span class="text-success">Services</span> <i
                class="fa-solid fa-chevron-right me-1"></i>{{ $service->service_name }}
        </h5>
        <hr class="mt-0">
    @stop

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 col-12 d-flex justify-content-center mb-2">
                    <div class="bg-secondary p-2 text-black px-3 rounded-1 bg-opacity-25"
                        style="width: 650px; height: 460px">
                        <h5 class="mb-3 fw-bold bg-white px-1 py-1 rounded-1 text-center text-primary">Upload <span
                                class="text-success">Content</span></h5>
                        <form action="{{ route('service.content.store', $service->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="header" class="form-label">Header</label>
                                <input type="text" class="form-control" id="header" name="header"
                                    value="{{ old('header') }}" placeholder="Enter header">
                                @error('header')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" id="content" name="content" rows="5" placeholder="Enter content">{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image (Optional)</label>
                                <input type="file" class="form-control" id="image" name="image[]" accept="image/*"
                                    multiple>
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Add Content</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-5 col-12 p-0">
                    <div class="bg-secondary bg-opacity-25 p-2 rounded-1 position-relative" style="height: 460px">
                        <div class="bg-secondary bg-opacity-25 p-0 rounded-1 text-black">
                            <h5 class="mb-3 fw-bold bg-white px-1 py-1 rounded-1 text-center text-primary">Service
                                <span class="text-success">Content</span>
                            </h5>
                        </div>
                        <hr class="mt-0 text-black">

                        <!-- Content -->
                        <div>
                            @forelse ($services as $data)
                                <div class="clickable-container position-relative mb-1">
                                    <!-- Card -->
                                    <div class="d-flex align-items-center bg-white bg-opacity rounded-1 px-3"
                                        data-bs-toggle="modal" data-bs-target="#serviceModal{{ $data->id }}"
                                        style="cursor: pointer;">
                                        <div class="me-3">
                                            @if ($data->image)
                                                @foreach (json_decode($data->image, true) as $image)
                                                    <img src="{{ asset('service_content/' . $image) }}"
                                                        class="border border-1 border-secondary object-fit" height="50"
                                                        width="50" alt="{{ $data->header }}" style="object-fit: cover;">
                                                @endforeach
                                            @else
                                                <img src="{{ asset('assets/img/no-img.png') }}" height="50"
                                                    width="50" alt="Default Image" style="object-fit: cover;">
                                            @endif
                                        </div>
                                        <div class="list-group">
                                            <div class="p-2">
                                                <div class="flex-grow-1">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h6 class="mb-0 text-dark fw-bold">{{ $data->header }}</h6>
                                                        </div>
                                                        <div class="col-12">
                                                            <p class="mb-0 text-muted">
                                                                {{ strlen($data->content) > 37 ? substr($data->content, 0, 37) . '...' : $data->content }}
                                                            </p>
                                                        </div>
                                                    </div>
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
                                                <span class="text-danger">No Service</span>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforelse
                        </div>

                        <!-- Pagination Links -->
                        <div
                            class="d-flex justify-content-center align-items-center position-absolute bottom-0 start-0 w-100">
                            {{ $services->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                @foreach ($services as $data)
                    <div class="modal fade" id="serviceModal{{ $data->id }}" tabindex="-1"
                        aria-labelledby="serviceModalLabel{{ $data->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="serviceModalLabel{{ $data->id }}">
                                        {{ $data->header }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row mb-2">
                                        <div class="col-12 d-flex justify-content-end">
                                            <!-- Edit Button -->
                                            <button type="button" class="btn btn-primary btn-sm me-2"
                                                data-bs-toggle="modal" data-bs-target="#editModal{{ $data->id }}">
                                                Edit
                                            </button>

                                            <form action="{{ route('service.content.destroy', $data->id) }}"
                                                method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>

                                        </div>
                                    </div>
                                    <div class="bg-secondary rounded shadow-sm">

                                        @if ($data->image)
                                            <div id="carousel{{ $data->id }}" class="carousel slide mb-4"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    @foreach (json_decode($data->image, true) as $index => $image)
                                                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                            <img src="{{ asset('service_content/' . $image) }}"
                                                                class="d-block w-100 rounded"
                                                                style="max-height: 300px; object-fit: cover;"
                                                                alt="{{ $data->header }}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carousel{{ $data->id }}" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carousel{{ $data->id }}" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                        @else
                                            <div class="text-center mb-4">
                                                <h6 class="text-danger fw-bold">No Image Uploaded</h6>
                                                <p class="text-muted">This service has no images available at the moment.
                                                </p>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="service-content">
                                        <p class="text-dark" style="font-size: 1.1rem; line-height: 1.5;">
                                            {{ $data->content }}
                                        </p>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                @foreach ($services as $data)
                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1"
                        aria-labelledby="editModalLabel{{ $data->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel{{ $data->id }}">Edit Item</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Edit Form -->
                                    <form action="{{ route('service.content.update', $data->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label for="header" class="form-label">Header</label>
                                            <input type="text" class="form-control" id="header" name="header"
                                                value="{{ old('header', $data->header) }}" placeholder="Enter header">
                                            @error('header')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="content" class="form-label">Content</label>
                                            <textarea class="form-control" id="content" name="content" rows="5" required placeholder="Enter content">{{ old('content', $service->content) }}</textarea>
                                            @error('content')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="image" class="form-label">Replace Images
                                                (Optional)</label>
                                            <input type="file" class="form-control" id="image" name="image[]"
                                                accept="image/*" multiple>
                                            <small class="text-muted">Leave empty to keep existing
                                                images.</small>
                                            @error('image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label>Existing Images</label>
                                            <div class="d-flex flex-wrap">
                                                @if ($data->image)
                                                    @foreach (json_decode($data->image, true) as $image)
                                                        <div class="m-2">
                                                            <img src="{{ asset('service_content/' . $image) }} "
                                                                alt="Image" class="img-thumbnail"
                                                                style="width: 100px; height: 100px;">
                                                            <p class="text-center">
                                                                <input type="checkbox" name="remove_images[]"
                                                                    value="{{ $image }}"> Remove
                                                            </p>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <p>No images available.</p>
                                                @endif
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success">Update Content</button>
                                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <!-- jQuery and Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

        <script>
            var myModalElement = document.getElementById('editModal{{ $data->id }}');
            var myModal = new bootstrap.Modal(myModalElement);

            myModalElement.addEventListener('hidden.bs.modal', function() {
                var backdrop = document.querySelector('.modal-backdrop');
                if (backdrop) {
                    backdrop.remove();
                }

                location.reload();
            });
        </script>
    @stop
</x-app-layout>
