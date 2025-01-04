@extends('layouts.barangay')

@section('content')
<h6 class="mt-4"><i class="fa-solid fa-asterisk me-1"></i>{{ $title->transparency_name }}</h6>
<hr class="mt-0">

<div class="container-fluid">

    <!-- Check if transparency title has an image -->
    @if ($title->image)
        <img src="{{ asset('media/images/' . $title->image) }}" alt="{{ $title->transparency_name }}"
            class="media-title-image">
    @endif
</div>

<!-- Media Files Section -->
<div class="media-files">
    <div class="media-file-card">

        <!-- Check if file exists -->
        <table class="table table-bordered">
            <tbody>
                @foreach ($content as $item)
                    <tr>
                        @if ($item->file)
                            <td>
                                <!-- View file link -->
                                <a href="{{ url('media/file/' . $item->file) }}" target="_blank"
                                    style="color: black" class="">
                                    {{ $item->file }}
                                </a>
                            </td>
                            <td>
                                <!-- Display the file size in MB -->
                                @php
                                    $filePath = public_path('media/file/' . $item->file);
                                    $fileSize = filesize($filePath) / 1024;
                                    $displaySize =
                                        $fileSize < 1024
                                            ? number_format($fileSize, 2) . ' KB'
                                            : number_format($fileSize / 1024, 2) . ' MB';
                                @endphp
                                <p>{{ $displaySize }}</p>
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
@endsection
