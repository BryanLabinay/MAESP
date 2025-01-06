{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
{{-- @include('layouts.welcome.navigation') --}}
<!-- Section Title -->
<x-user-layout>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <section id="services" class="services p-4">

        <div class="container section-title" data-aos="fade-up">
            <h2 class="body">{{ $title->news_name }}</h2>
            {{-- <p>List of Services</p> --}}
        </div><!-- End Section Title -->


        <div class="container">
            <!-- Media Title Section -->
            <!-- filepath: /c:/xampp/htdocs/LARAVEL/MAESP/resources/views/user/Media/media-resources.blade.php -->
            <!-- Include DataTables CSS -->
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

            <!-- Check if media title has an image -->
            @if ($title->image)
            <img src="{{ asset('media/images/' . $title->image) }}" alt="{{ $title->news_name }}"
                class="img-fluid rounded" style="max-width: 600px; height: auto;">
        @endif
        </div>

        <!-- Media Files Section -->
        <div class="media-files">
            <div class="media-file-card">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-warning text-center">
                                <h4 class="mb-0">        {{ $title->news_name }}
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="media-files row gy-4">
                                    @foreach ($content as $item)
                                        @if ($item->file)
                                            <div class="col-md-4">
                                                <div class="card">
                                                    <img src="{{ asset('news/file/' . $item->file) }}" class="card-img-top" alt="News Image">
                                                    <div class="card-body">
                                                        <p class="card-text">
                                                            {{ $item->title ?? 'Untitled News' }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-12">
                                                <p>No file available.</p>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
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
