<x-user-layout>
    <section id="services" class="services">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2 class="body">{{ $service->service_name }}</h2>
            {{-- <p>List of Services</p> --}}
        </div><!-- End Section Title -->
        <div class="content">
            <div class="container">
                <div class="row g-4">
                    @foreach ($serviceContents as $content)
                        <div class="col-lg-3 col-md-6">
                            <div class="service-item">
                                <div class="card shadow-sm h-100">
                                    <!-- Image Section with Carousel -->
                                    @if ($content->image)
                                        <div id="carousel{{ $loop->index }}" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                @foreach (json_decode($content->image, true) as $index => $image)
                                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                        <img src="{{ asset('service_content/' . $image) }}"
                                                            class="d-block w-100 img-fluid rounded-top"
                                                            style="height: 200px; object-fit: cover;"
                                                            alt="{{ $content->header }}">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carousel{{ $loop->index }}" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carousel{{ $loop->index }}" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    @else
                                        <img src="{{ asset('assets/img/default.jpg') }}"
                                            class="card-img-top img-fluid rounded-top"
                                            style="height: 200px; object-fit: cover;" alt="Default Image">
                                    @endif

                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <!-- Header -->
                                        @if ($content->header)
                                            <h5 class="card-title text-primary text-truncate" style="font-weight: 600;">
                                                {{ $content->header }}
                                            </h5>
                                        @endif

                                        <!-- Content -->
                                        <p class="card-text text-muted">
                                            {{ strlen($content->content) > 100 ? substr($content->content, 0, 100) . '...' : $content->content }}
                                        </p>

                                        <!-- Action Button -->
                                        <button type="button" class="btn btn-sm btn-outline-primary mt-2"
                                            data-bs-toggle="modal" data-bs-target="#modal-{{ $content->id }}">
                                            Read More
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="modal-{{ $content->id }}" tabindex="-1"
                            aria-labelledby="modalLabel-{{ $content->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header text-white">
                                        <h5 class="modal-title" id="modalLabel-{{ $content->id }}">
                                            {{ $content->header }}
                                        </h5>
                                        <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <!-- Modal Body -->
                                    <div class="modal-body">
                                        @if ($content->image)
                                            <div class="text-center mb-3">
                                                <img src="{{ asset('service_content/' . json_decode($content->image, true)[0]) }}"
                                                    class="img-fluid rounded shadow-sm" alt="{{ $content->header }}"
                                                    style="max-height: 400px; object-fit: cover;">
                                            </div>
                                        @endif
                                        <p class="text-muted" style="font-size: 1.1rem; line-height: 1.6;">
                                            {{ $content->content }}
                                        </p>
                                    </div>

                                    <!-- Modal Footer -->
                                    <div class="modal-footer bg-light">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>

    {{-- <div class="">
        <h6 class="mt-4"><i class="fa-solid fa-asterisk me-1"></i>{{ $service->service_name }}</h6>
        <hr class="mt-0">
        <div class="container-fluid">

            <p><strong>Service Name:</strong> </p>

            @if ($service->image)
                <p><strong>Image:</strong></p>
                @foreach ($service->image as $image)
                    <img src="{{ asset('service_content/' . $image) }}" alt="{{ $service->service_name }}"
                        class="img-fluid">
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
    </div> --}}
</x-user-layout>
