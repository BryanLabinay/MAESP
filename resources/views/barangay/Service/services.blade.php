@extends('layouts.barangay')

@section('content')
    <h6 class="mt-4"><i class="fa-solid fa-asterisk me-1"></i>{{ $service->service_name }}</h6>
    <hr class="mt-0">
    <div class="container-fluid">

        <p><strong>Service Name:</strong> {{ $service->service_name }}</p>

        @if($service->image)
            <p><strong>Image:</strong></p>
            <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->service_name }}" class="img-fluid">
        @else
            <p><strong>No image available for this service.</strong></p>
        @endif

        <h5 class="mt-4">Content for this Service</h5>

        @if($serviceContents->isEmpty())
            <p>No content yet added.</p>
        @else
            @foreach ($serviceContents as $content)
                <div class="content-item">
                    @if($content->header)
                        <h6><strong>{{ $content->header }}</strong></h6>
                    @endif
                    <p>{{ $content->content }}</p>

                    @if($content->image)
                    <img src="{{ asset($content->image) }}" alt="Content Image" class="img-fluid mb-3">
                @else

                    <p><strong>No image available for this content.</strong></p>
                    @endif
                </div>
            @endforeach
        @endif
    </div>
@endsection
