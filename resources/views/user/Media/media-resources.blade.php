{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
{{-- @include('layouts.welcome.navigation') --}}
<!-- Section Title -->
<x-user-layout>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <section id="services" class="services p-4">

        <div class="container section-title" data-aos="fade-up">
            <h2 class="body">{{ $mediaTitle->media_name }}</h2>
            {{-- <p>List of Services</p> --}}
        </div><!-- End Section Title -->


        <div class="container">
            <!-- Media Title Section -->
            <!-- filepath: /c:/xampp/htdocs/LARAVEL/MAESP/resources/views/user/Media/media-resources.blade.php -->
            <!-- Include DataTables CSS -->
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

            <!-- Check if media title has an image -->
            @if ($mediaTitle->image)
                <img src="{{ asset('media/images/' . $mediaTitle->image) }}" alt="{{ $mediaTitle->media_name }}"
                    class="media-title-image">
            @endif
        </div>

        <!-- Media Files Section -->
        <div class="media-files">
            <div class="media-file-card">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-warning text-center">
                                <h4 class="mb-0">{{ $mediaTitle->media_name }}</h4>
                            </div>
                            <div class="card-body">
                                <table id="mediaTable" class="table table-hover table-striped table-bordered">
                                    <thead class="table-secondary">
                                        <tr>
                                            <th></th>
                                            <th class="text-center">File Size</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($media as $item)
                                            @if ($item->file)
                                                <tr>
                                                    <td>
                                                        <a href="{{ url('media/file/' . $item->file) }}" target="_blank"
                                                            class="text-decoration-none text-primary fw-bold">
                                                            {{ $item->title }}
                                                        </a>
                                                    </td>
                                                    <td class="text-center">
                                                        @php
                                                            $filePath = public_path('media/file/' . $item->file);
                                                            $fileSize = filesize($filePath) / 1024;
                                                            $displaySize =
                                                                $fileSize < 1024
                                                                    ? number_format($fileSize, 2) . ' KB'
                                                                    : number_format($fileSize / 1024, 2) . ' MB';
                                                        @endphp
                                                        <span class="badge bg-info text-dark">{{ $displaySize }}</span>
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
        </div>

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
        </div>


    </section>


</x-user-layout>

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
