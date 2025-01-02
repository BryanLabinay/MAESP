    <h6 class="mt-4"><i class="fa-solid fa-asterisk me-1"></i>{{ $service->service_name }}</h6>
    <hr class="mt-0">
    <div class="container-fluid">

        <p><strong>Service Name:</strong> {{ $service->service_name }}</p>

        @if ($service->image)
            <p><strong>Image:</strong></p>
            @foreach ($service->image as $image)
                <img src="{{ asset('service_content/' . $image) }}" alt="{{ $service->service_name }}" class="img-fluid">
            @endforeach
        @else
            <p>No image available</p>
        @endif

        <h5 class="mt-4">Content for this Service</h5>

        @if ($serviceContents->isEmpty())
            <p>No content yet added.</p>
        @else
            @foreach ($serviceContents as $content)
                <div class="content-item">
                    @if ($content->header)
                        <h6><strong>{{ $content->header }}</strong></h6>
                    @endif
                    <p>{{ $content->content }}</p>

                    @if ($content->image)
                        @foreach (json_decode($content->image) as $image)
                            <img src="{{ asset('service_content/' . $image) }}" alt="Content Image" width="300px"
                                class="img-fluid mb-3">
                        @endforeach
                    @else
                        <p><strong>No image available for this content.</strong></p>
                    @endif
                </div>
            @endforeach
        @endif
    </div>
