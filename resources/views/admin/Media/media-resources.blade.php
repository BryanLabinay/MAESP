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
    @stop

    @section('content_header')
        <h5 class="fw-semibold text-md">Media Resources</h5>
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
                        title: 'Media Resource added!'
                    })
                })()
            </script>
        @endif
    @stop

    @section('content')
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-12 d-flex justify-content-end">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addMediaModal">
                        Add Media Resources
                    </button>
                </div>
            </div>

            <div class="row">
                @foreach ($mediaItems as $mediaTitle)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <a href="{{ route('media.content', $mediaTitle->id) }}" class="text-decoration-none text-dark">
                            <div class="card h-100 shadow-sm border-0">
                                @if ($mediaTitle->image)
                                    <img src="{{ asset('media/image/' . $mediaTitle->image) }}"
                                        alt="{{ $mediaTitle->media_name }}" class="card-img-top img-fluid rounded-top"
                                        style="height: 200px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('assets/img/media.jpg') }}" alt="{{ $mediaTitle->media_name }}"
                                        class="card-img-top img-fluid rounded-top"
                                        style="height: 200px; object-fit: cover;">
                                @endif

                                <div class="card-body d-flex flex-column align-items-center text-center">
                                    <h5 class="card-title mb-2 text-primary fw-bold">{{ $mediaTitle->media_name }}</h5>
                                    <button class="btn btn-outline-primary mt-auto">View Details</button>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>



            <div class="modal fade" id="addMediaModal" tabindex="-1" aria-labelledby="addMediaModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="addMediaModalLabel">Add New Media</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <form id="addMediaForm" method="POST" action="{{ route('add-media') }}"
                                enctype="multipart/form-data">
                                <!-- CSRF Token -->
                                @csrf
                                <!-- Media Title Field -->
                                <div class="mb-3">
                                    <label for="mediaName" class="form-label">Media Name</label>
                                    <input type="text" class="form-control" id="mediaName" name="media_name"
                                        placeholder="Enter media name" required>
                                </div>
                                {{-- <!-- Description Field -->
                                <div class="mb-3">
                                    <label for="mediaDescription" class="form-label">Description</label>
                                    <textarea class="form-control" id="mediaDescription" name="description" rows="3" placeholder="Enter media description"></textarea>
                                </div> --}}
                                <!-- Image Upload Field -->
                                <div class="mb-3">
                                    <label for="mediaImage" class="form-label">Media Image</label>
                                    <input type="file" class="form-control" id="mediaImage" name="image"
                                        accept="image/*">
                                </div>
                                <!-- Submit Button -->
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Upload Media</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        @stop
        @section('js')
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        @endsection
</x-app-layout>
