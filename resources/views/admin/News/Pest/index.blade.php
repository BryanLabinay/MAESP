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
        <h5 class="fw-semibold text-md">Pest & Disease Alerts</h5>
        <hr class="mt-0">
    @stop

    @section('content')
        <div class="container-fluid">
            <!-- Button to trigger modal -->
            <div class="row mb-2">
                <div class="col-12 d-flex justify-content-end">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addNewsModal"><i
                            class="fa-solid fa-plus me-1"></i>Add News</button>
                </div>
            </div>

            <hr class="mt-0">
            <div class="row">
                @if ($pest->isEmpty())
                    <div class="col-12">
                        <h6>No News and Updates available at the moment.</h6>
                    </div>
                @else
                    @foreach ($pest as $data)
                        <div class="col-md-3 mb-3">
                            <div class="card h-100">
                                @if ($data->image_path)
                                    <img src="{{ asset('storage/' . $data->image_path) }}" class="card-img-top img-fluid"
                                        style="height: 200px; object-fit: cover;" alt="{{ $data->title }}">
                                @else
                                    <img src="{{ asset('assets/img/pest.png') }}" class="card-img-top img-fluid"
                                        style="height: 200px; object-fit: cover;" alt="{{ $data->title }}">
                                @endif

                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold">{{ $data->title }}</h5>
                                    <p class="card-text">{{ $data->content }}</p>
                                    <p class="text-muted mt-0">
                                        {{ \Carbon\Carbon::parse($data->date)->format('F j, Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>



            <!-- Modal -->
            <div class="modal fade" id="addNewsModal" tabindex="-1" aria-labelledby="addNewsModalLabel" aria-hidden="true"
                data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addNewsModalLabel">Create News</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="newsForm" action="{{ route('news.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf <!-- Include CSRF token for Laravel -->
                                <div class="mb-3">
                                    <label for="newsTitle" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="newsTitle" name="title" required>
                                </div>
                                <div class="mb-3">
                                    <label for="newsContent" class="form-label">Description</label>
                                    <textarea class="form-control" id="newsContent" name="content" rows="2" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="newsDate" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="newsDate" name="date" required>
                                </div>
                                <div class="mb-3">
                                    <label for="newsImages" class="form-label">Images</label>
                                    <input type="file" class="form-control" id="newsImages" name="images">
                                </div>


                                {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-danger me-2"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" form="newsForm">Upload News</button>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    @stop
</x-app-layout>
