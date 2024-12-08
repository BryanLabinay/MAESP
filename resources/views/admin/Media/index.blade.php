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
    @stop

    @section('content')
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-12 d-flex justify-content-end">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addMediaModal">
                        Add Media
                    </button>
                </div>
            </div>


            <div class="row">
                @foreach ($mediaItems as $media)
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $media->title }}</h5>
                                <p class="card-text">{{ $media->description }}</p>
                                <a class="btn btn-primary" href="{{ asset('storage/' . $media->file) }}"
                                    target="_blank">View File</a>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="modal fade" id="addMediaModal" tabindex="-1" aria-labelledby="addMediaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="addMediaModalLabel">Add New Media</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form id="addMediaForm" method="POST" action="{{ route('media.store') }}"
                            enctype="multipart/form-data">
                            <!-- CSRF Token -->
                            @csrf
                            <!-- Media Title Field -->
                            <div class="mb-3">
                                <label for="mediaTitle" class="form-label">Media Title</label>
                                <input type="text" class="form-control" id="mediaTitle" name="title"
                                    placeholder="Enter media title">
                            </div>
                            <!-- Media File Upload -->
                            <div class="mb-3">
                                <label for="mediaFile" class="form-label">Upload Media</label>
                                <input type="file" class="form-control" id="mediaFile" name="file[]" multiple>
                            </div>
                            <!-- Description Field -->
                            <div class="mb-3">
                                <label for="mediaDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="mediaDescription" name="description" rows="3"
                                    placeholder="Enter media description"></textarea>
                            </div>
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Save Media</button>
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
