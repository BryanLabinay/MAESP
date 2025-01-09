<x-user-layout>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <section id="services" class="services p-4">

        <div class="container section-title" data-aos="fade-up">
            <h2 class="body">{{ $title->news_name }}</h2>
            {{-- <p>List of Services</p> --}}
        </div><!-- End Section Title -->

        <div class="content">
            <div class="container">
                <div class="row g-4">
                    @foreach ($content as $data)
                        <div class="col-lg-3 col-md-6">
                            <div class="service-item">
                                <div class="card shadow-sm h-100">
                                    @if ($data->file)
                                        <img src="{{ asset('news/file/' . $data->file) }}" alt="{{ $data->news_name }}"
                                            class="card-img-top img-fluid rounded-top"
                                            style="height: 200px; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('assets/img/news.jpg') }}" alt="{{ $data->news_name }}"
                                            class="card-img-top img-fluid rounded-top"
                                            style="height: 200px; object-fit: cover;">
                                    @endif

                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <!-- Header -->
                                        @if ($data->title)
                                            <h5 class="card-title text-primary text-truncate" style="font-weight: 600;">
                                                {{ $data->title }}
                                            </h5>
                                        @endif

                                        <!-- Content -->
                                        <p class="card-text text-muted">
                                            {{ strlen($data->description) > 100 ? substr($data->description, 0, 100) . '...' : $data->description }}
                                        </p>
                                        <!-- Action Button -->
                                        <button type="button" class="btn btn-sm btn-outline-primary mt-2"
                                            data-bs-toggle="modal" data-bs-target="#modal-{{ $data->id }}">
                                            Read More
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @foreach ($content as $data)
                    <!-- Modal -->
                    <div class="modal fade" id="modal-{{ $data->id }}" tabindex="-1"
                        aria-labelledby="modalLabel-{{ $data->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header text-white">
                                    <h5 class="modal-title" id="modalLabel-{{ $data->id }}">
                                        {{ $data->title }}
                                    </h5>
                                    <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    @if ($data->file)
                                        <div class="text-center mb-3">
                                            <img src="{{ asset('news/file/' . $data->file) }}"
                                                alt="{{ $data->news_name }}" class="img-fluid rounded shadow-sm"
                                                style="max-height: 300px; object-fit: cover;">
                                        </div>
                                    @endif
                                    <p class="text-muted" style="font-size: 1.1rem; line-height: 1.6;">
                                        {{ $data->description }}
                                    </p>
                                </div>

                                <!-- Modal Footer -->
                                <div class="modal-footer justify-content-between bg-light">
                                    <span class="text-muted">Published on
                                        {{ $data->created_at->format('M d, Y') }}</span>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </section>


</x-user-layout>

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
