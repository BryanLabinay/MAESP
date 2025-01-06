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
        <h5 class="fw-semibold text-md">News and Update</h5>
        <hr class="mt-0">
    @stop

    @section('content')
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-12 d-flex justify-content-end">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addNewsModal">
                        Add News
                    </button>
                </div>
            </div>

            <div class="row">
                @foreach ($news as $new)
                    <div class="col-3">
                        <a href="{{ route('content', $new->id) }}" class="text-decoration-none text-dark">
                            <div class="card" style="width: 18rem;">
                                @if ($new->image)
                                    <img src="{{ asset('storage/' . $new->image) }}" alt="{{ $new->news_name }}"
                                        class="card-img-top img-fluid" style="height: 200px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('assets/img/market.jpg') }}" class="card-img-top img-fluid"
                                        style="height: 200px; object-fit: cover;" alt="{{ $new->news_name }}">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $new->news_name }}</h5>
                                    <p class="card-text">{{ $new->description }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>


            <div class="modal fade" id="addNewsModal" tabindex="-1" aria-labelledby="addNewsModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="addNewsModalLabel">Add News and Update</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <form id="addNewsForm" method="POST" action="{{ route('news.add') }}"
                                enctype="multipart/form-data">
                                <!-- CSRF Token -->
                                @csrf
                                <!-- News Title Field -->
                                <div class="mb-3">
                                    <label for="newsName" class="form-label">News Name</label>
                                    <input type="text" class="form-control" id="newsName" name="news_name"
                                        placeholder="Enter news name" required>
                                </div>
                                <!-- Description Field -->
                                <div class="mb-3">
                                    <label for="newsDescription" class="form-label">Description</label>
                                    <textarea class="form-control" id="newsDescription" name="description" rows="3"
                                        placeholder="Enter news description"></textarea>
                                </div>
                                <!-- Image Upload Field -->
                                <div class="mb-3">
                                    <label for="newsImage" class="form-label">News Image</label>
                                    <input type="file" class="form-control" id="newsImage" name="image"
                                        accept="image/*">
                                </div>
                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">Save News</button>
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
