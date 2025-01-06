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
            Adding Content for: {{ $content->transparency_name }}
        </h5>
        <hr class="mt-0">
    @stop

    @section('content')

        <div class="container-fluid">
            <div class="row">
                <!-- Transparency Content Form -->
                <div class="col-md-6">
                    <form id="addTransparencyForm" method="POST" action="{{ route('content.store') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="transparency_id" value="{{ $content->id }}">

                        <div class="mb-3">
                            <label for="transparencyTitle" class="form-label">Transparency Title</label>
                            <input type="text" class="form-control" id="transparencyTitle" name="title"
                                placeholder="Enter transparency title">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="transparencyFile" class="form-label">Upload Transparency</label>
                            <input type="file" class="form-control" id="transparencyFile" name="file[]" required
                                multiple>
                            @error('file')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description Field -->
                        <div class="mb-3">
                            <label for="transparencyDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="transparencyDescription" name="description" rows="3"
                                placeholder="Enter transparency description"></textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Save Transparency</button>
                    </form>
                </div>

                <!-- Transparency Content List -->
                <div class="col-md-6">
                    <h5 class="fw-semibold text-md">Transparency Content List</h5>
                    <table id="transparencyTable" class="table table-hover table-striped table-bordered">
                        <thead class="table-secondary">
                            <tr>
                                <th>File</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transparencies as $transparency)
                                <tr>
                                    <td>
                                        <a href="{{ asset('media/file/' . $transparency->file) }}" target="_blank">
                                            {{ $transparency->title }}
                                        </a>
                                    </td>
                                    <td>{{ $transparency->description }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Include jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Include DataTables JS -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

        <!-- Initialize DataTable -->
        <script>
            $(document).ready(function() {
                $('#transparencyTable').DataTable();
            });
        </script>

    @stop

    @section('js')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @endsection
</x-app-layout>
