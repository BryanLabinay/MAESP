@extends('layouts.barangay')

@section('content')
    <h6 class="mt-4"><i class="fa-solid fa-asterisk me-1"></i>{{ $title->news_name }}</h6>
    <hr class="mt-0">

    <div class="container-fluid">
        <!-- Media Title Section -->
        <div class="media-title text-center mb-4">
            @if ($title->image)
                <img src="{{ asset('media/images/' . $title->image) }}" alt="{{ $title->news_name }}"
                    class="img-fluid rounded" style="max-width: 600px; height: auto;">
            @endif
        </div>

        <!-- Media Files Section -->
        <div class="media-files">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-warning text-center">
                            <h4 class="mb-0">{{ $title->news_name }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row gy-4">
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
                                        <div class="col-12 text-center">
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
@endsection
