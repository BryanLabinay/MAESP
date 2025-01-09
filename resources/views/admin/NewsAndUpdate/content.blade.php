<x-app-layout>
    @section('css')
        <!-- Bootstrap CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- Google Fonts -->
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
        <h5 class="fw-semibold text-md">
            Adding Media Content for: {{ $content->news_name }}
        </h5>
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
                        title: 'News and Updates Content added!'
                    })
                })()
            </script>
        @endif
    @stop

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 col-12 d-flex justify-content-center mb-2">
                    <div class="bg-secondary p-2 text-black px-3 rounded-1 bg-opacity-25"
                        style="width: 650px; height: 460px">
                        <h5 class="mb-3 fw-bold bg-white px-1 py-1 rounded-1 text-center text-primary">Upload <span
                                class="text-success">Content</span></h5>
                        <form id="addMediaForm" method="POST" action="{{ route('news.store') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Hidden Media ID Field -->
                            <input type="hidden" name="news_id" value="{{ $content->id }}">

                            <!-- Media Title Field -->
                            <div class="mb-3">
                                <label for="mediaTitle" class="form-label">News Title</label>
                                <input type="text" class="form-control" id="mediaTitle" name="title"
                                    placeholder="Enter media title">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="mediaDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="mediaDescription" name="description" rows="3"
                                    placeholder="Enter a brief description"></textarea>
                                @error('description')
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
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Upload Media</button>
                            </div>
                        </form>
                    </div>
                </div>


                <!-- Media Content List -->
                <div class="col-md-5 col-12 p-0">
                    <div class="bg-secondary bg-opacity-25 p-2 rounded-1 position-relative" style="height: 460px">
                        <div class="bg-secondary bg-opacity-25 p-0 rounded-1 text-black">
                            <h5 class="mb-3 fw-bold bg-white px-1 py-1 rounded-1 text-center text-primary">News &
                                <span class="text-success">Update</span>
                            </h5>
                        </div>
                        <hr class="mt-0 text-black">

                        <!-- Content -->
                        <div>
                            @forelse ($news as $data)
                                <div class="clickable-container position-relative mb-1">
                                    <!-- Card -->
                                    <div class="d-flex align-items-center bg-white bg-opacity rounded-1 px-3"
                                        data-bs-toggle="modal" data-bs-target="#serviceModal{{ $data->id }}"
                                        style="cursor: pointer;">
                                        <div class="me-3">

                                            @if (!empty($data->file))
                                                <img src="{{ asset('news/file/' . $data->file) }}" height="50"
                                                    width="50" style="object-fit: cover;" alt="{{ $data->title }}">
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
                                                            <h6 class="mb-0 text-dark fw-bold">{{ $data->title }}</h6>
                                                        </div>
                                                        <div class="col-12">
                                                            <p class="mb-0 text-muted">
                                                                {{ strlen($data->description) > 37 ? substr($data->description, 0, 37) . '...' : $data->description }}
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
                                                <span class="text-danger">No Content</span>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforelse
                        </div>

                        <!-- Pagination Links -->
                        {{-- <div
                            class="d-flex justify-content-center align-items-center position-absolute bottom-0 start-0 w-100">
                            {{ $services->links('pagination::bootstrap-5') }}
                        </div> --}}
                    </div>
                    @foreach ($news as $data)
                        <div class="modal fade" id="serviceModal{{ $data->id }}" tabindex="-1"
                            aria-labelledby="serviceModalLabel{{ $data->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="serviceModalLabel{{ $data->id }}">
                                            {{ $data->title }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row mb-2">
                                            <div class="col-12 d-flex justify-content-end">
                                                <!-- Edit Button -->
                                                <button type="button" class="btn btn-primary btn-sm me-2"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $data->id }}">
                                                    Edit
                                                </button>


                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>

                                            </div>
                                        </div>
                                        <div class="bg-secondary rounded shadow-sm">

                                            @if ($data->file)
                                                <div id="carousel{{ $data->id }}" class="carousel slide mb-4"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <img src="{{ asset('news/file/' . $data->file) }}"
                                                            alt="">
                                                    </div>
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#carousel{{ $data->id }}"
                                                        data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                            aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#carousel{{ $data->id }}"
                                                        data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                            aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
                                            @else
                                                <div class="text-center mb-4">
                                                    <h6 class="text-danger fw-bold">No Image Uploaded</h6>
                                                    <p class="text-muted">This service has no images available at the
                                                        moment.
                                                    </p>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="service-content">
                                            <p class="text-dark" style="font-size: 1.1rem; line-height: 1.5;">
                                                {{ $data->description }}
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
                </div>
                {{-- <div class="col-md-5 col-12">
                    <!-- Media Content List Card -->
                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="fw-semibold mb-0">News Content List</h5>
                        </div>
                        <div class="card-body">
                            <table id="mediaTable" class="table table-hover table-striped table-bordered">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>Title</th>
                                        <th>File Size</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($news as $item)
                                        @if ($item->file)
                                            <tr>
                                                <td>{{ $item->title }}</td>
                                                <td>
                                                    @php
                                                        $filePath = public_path('news/file/' . $item->file);
                                                        $fileSize = filesize($filePath) / 1024;
                                                        $displaySize =
                                                            $fileSize < 1024
                                                                ? number_format($fileSize, 2) . ' KB'
                                                                : number_format($fileSize / 1024, 2) . ' MB';
                                                    @endphp
                                                    <span class="badge bg-info text-white">{{ $displaySize }}</span>
                                                </td>
                                                <td class="text-center p-0">
                                                    <a href="#" class="btn btn-danger btn-sm mt-1">Delete</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    @stop

    @section('js')
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @endsection
</x-app-layout>
