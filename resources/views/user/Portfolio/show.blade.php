<x-user-layout>
    <style>
        .portfolio-img {
            height: 250px;
            /* Adjust the height as needed */
            object-fit: cover;
            width: 100%;
            /* Ensures the image spans the container width */
            border-radius: 8px;
            /* Optional: adds rounded corners */
        }
    </style>
    <section id="recent-posts" class="recent-posts section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2 class="text-uppercase">Agriculture Office Team in Action</h2>
            {{-- <p>Necessitatibus eius consequatur</p> --}}
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row gy-5">
                @foreach ($portfolios as $portfolio)
                    <div class="col-xl-4 col-md-6">
                        <div class="post-item position-relative h-100" data-aos="fade-up"
                            data-aos-delay="{{ $loop->index * 100 + 100 }}">

                            <div class="post-img position-relative overflow-hidden">
                                <!-- Apply the custom 'portfolio-img' class -->
                                <img src="{{ asset('images/' . $portfolio->image) }}" class="img-fluid portfolio-img"
                                    alt="{{ $portfolio->title }}">
                                <span
                                    class="post-date bg-success">{{ \Carbon\Carbon::parse($portfolio->created_at)->format('F d') }}</span>
                            </div>

                            <div class="post-content d-flex flex-column p-2">
                                <h5 class="card-title text-uppercase">{{ $portfolio->title }}</h5>

                                <h6 class=""><i class="fa-solid fa-caret-right me-1"></i>
                                    {{ Str::limit($portfolio->description, 150) }}
                                </h6>

                                <div class="meta d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-person"></i> <span class="ps-2">User</span>
                                    </div>
                                    <span class="px-3 text-black-50">/</span>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-folder2"></i> <span class="ps-2">Portfolio</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End post item -->
                @endforeach
            </div>

        </div>

    </section><!-- /Recent Posts Section -->
</x-user-layout>
