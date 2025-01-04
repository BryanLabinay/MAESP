<x-app-layout>
    @section('css')
        <!-- Bootstrap CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- Google Fonts -->
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
        <h5 class="fw-semibold text-md">
            Adding Media Content for: {{ $mediaTitle->media_name }}
        </h5>
        <hr class="mt-0">
    @stop

    @section('content')
        <div class="container-fluid">
            <!-- Media Content Form -->

            <form id="addMediaForm" method="POST" action="{{ route('media.store') }}" enctype="multipart/form-data">
                <!-- CSRF Token -->
                @csrf

                <!-- Media Title Field -->
                <div class="mb-3">
                    <label for="mediaTitle" class="form-label">Media Title</label>
                    <input type="text" class="form-control" id="mediaTitle" name="title" placeholder="Enter media title">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Media File Upload -->
                <div class="mb-3">
                    <label for="mediaFile" class="form-label">Upload Media</label>
                    <input type="file" class="form-control" id="mediaFile" name="file[]" required multiple>
                    @error('file')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Media Description Field -->
                <div class="mb-3">
                    <label for="mediaDescription" class="form-label">Description</label>
                    <textarea class="form-control" id="mediaDescription" name="description" rows="3"
                        placeholder="Enter media description"></textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Save Media</button>
            </form>
        </div>
    @stop

    @section('js')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @endsection
</x-app-layout>
