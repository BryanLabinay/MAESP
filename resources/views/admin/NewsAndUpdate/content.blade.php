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
    @stop

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-12">
                    <!-- Media Content Card -->
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title mb-0">Add Media</h5>
                        </div>
                        <div class="card-body">
                            <!-- Media Content Form -->
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

                                <!-- Media File Upload -->
                                <div class="mb-3">
                                    <label for="mediaFile" class="form-label">Upload Media</label>
                                    <input type="file" class="form-control" id="mediaFile" name="file[]" required
                                        multiple>
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
                </div>

                <!-- Media Content List -->
                <div class="col-md-6 col-12">
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
                                                        $filePath = public_path('media/file/' . $item->file);
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
                </div>
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
