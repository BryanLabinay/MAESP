<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div class="container">
    <!-- Media Title Section -->
    <div class="media-title">
        <h1>{{ $mediaTitle->media_name }}</h1>

        <!-- Check if media title has an image -->
        @if($mediaTitle->image)
            <img src="{{ asset('media/images/' . $mediaTitle->image) }}" alt="{{ $mediaTitle->media_name }}" class="media-title-image">
        @endif
    </div>

    <!-- Media Files Section -->
    <div class="media-files">
        <div class="media-file-card">

            <!-- Check if file exists -->
            <table class="table table-bordered">
                <tbody>
                        @foreach ($media as $item)
                        <tr>
                                @if($item->file)
                                <td>
                                    <!-- View file link -->
                                    <a href="{{ url('media/file/' . $item->file) }}" target="_blank" style="color: black" class="">
                                    {{$item->file  }}
                                    </a>
                                </td>
                                <td>
                                    <!-- Display the file size in MB -->
                                    @php
                                        $filePath = public_path('media/file/' . $item->file);
                                        $fileSize = filesize($filePath) / 1024 / 1024;
                                        @endphp
                                    <p>{{ number_format($fileSize, 2) }} MB</p>
                                </td>
                                @else
                                <p>No file available.</p>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
