<x-user-layout>
    <section id="services" class="services">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2 class="body">{{ $service->service_name }}</h2>
            {{-- <p>List of Services</p> --}}
        </div><!-- End Section Title -->
        <div class="content">
            <div class="container">
                <div class="row g-0">
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <span class="number">01</span>
                            <div class="service-item-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="80" height="80" x="0" y="0"
                                    viewBox="0 0 509.435 509.435" style="enable-background: new 0 0 512 512"
                                    xml:space="preserve" class="">
                                    <g>
                                        <path
                                            d="M7.506 347.639c.994 0 2.005-.199 2.976-.619l62.037-26.857a7.5 7.5 0 0 0 3.903-9.862 7.5 7.5 0 0 0-9.862-3.903L4.523 333.255a7.501 7.501 0 0 0 2.983 14.384zM500.883 283.197c-10.953-10.952-28.175-11.423-39.689-1.267l-10.034-13.307c-19.783-26.239-46.1-46.623-76.103-58.948a7.5 7.5 0 0 0-5.699 13.875c11.136 4.575 21.708 10.382 31.567 17.249h-22.621c-4.143 0-7.5 3.358-7.5 7.5s3.357 7.5 7.5 7.5h41.188a169.382 169.382 0 0 1 19.691 21.855l11.048 14.652-71.171 67.597h-19.48a35.772 35.772 0 0 0 6.775-20.976c0-19.837-16.139-35.975-35.976-35.975h-75.023l-48.33-15.005a160.871 160.871 0 0 0-37.992-6.934l2.533-3.359a169.852 169.852 0 0 1 19.67-21.855h27.398c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5h-8.848a165.125 165.125 0 0 1 38.01-19.73c28.992-10.532 60.376-12.89 90.754-6.821a7.498 7.498 0 0 0 8.824-5.885 7.5 7.5 0 0 0-5.885-8.824 184.517 184.517 0 0 0-28.616-3.4v-83.727h64.189c43.49 0 78.872-35.382 78.872-78.872V22.488c0-8.712-7.088-15.801-15.801-15.801h-51.729c-4.143 0-7.5 3.358-7.5 7.5s3.357 7.5 7.5 7.5h51.729c.441 0 .801.359.801.801v11.051c0 35.219-28.653 63.872-63.872 63.872h-64.189V85.559c0-28.082 18.793-53.262 45.701-61.234a7.5 7.5 0 1 0-4.261-14.382c-15.972 4.732-30.338 14.681-40.451 28.015-10.46 13.79-15.988 30.25-15.988 47.601v16.416c-9.59-9.839-22.97-15.965-37.762-15.965h-43.432c-6.193 0-11.232 5.039-11.232 11.232v23.629c0 29.093 23.669 52.762 52.763 52.762h39.663v22.475a183.375 183.375 0 0 0-55.199 10.86c-32.974 11.978-61.705 33.297-83.085 61.653l-9.313 12.351a161.07 161.07 0 0 0-54.289 12.692 7.5 7.5 0 0 0-3.949 9.844 7.498 7.498 0 0 0 9.844 3.949c31.858-13.616 67.62-15.458 100.696-5.188l49.416 15.343c.72.224 1.47.337 2.224.337h76.161c11.566 0 20.976 9.409 20.976 20.975s-9.409 20.976-20.976 20.976h-71.803c-4.143 0-7.5 3.358-7.5 7.5s3.357 7.5 7.5 7.5h123.477a7.5 7.5 0 0 0 5.165-2.062l83.48-79.289c5.56-5.279 14.158-5.167 19.577.252a13.957 13.957 0 0 1 .853 18.9l-80.942 97.046a37.161 37.161 0 0 1-21.112 12.581L259.57 448.474c-20.377 4.113-41.89 1.365-60.575-7.739l-53.332-25.982a7.507 7.507 0 0 0-6.884.162L3.903 488.665a7.5 7.5 0 0 0 7.197 13.161l131.475-71.888 49.849 24.285c21.631 10.538 46.53 13.72 70.114 8.957l129.506-26.146a52.209 52.209 0 0 0 29.663-17.677l80.942-97.046c9.682-11.61 8.923-28.426-1.766-39.114zM258.212 158.634c-20.822 0-37.763-16.94-37.763-37.762V101.01h39.664c20.822 0 37.762 16.94 37.762 37.762v19.861h-39.663z"
                                            fill="currentColor" opacity="1" data-original="currentColor">
                                        </path>
                                        <path
                                            d="M319.171 240.778a7.5 7.5 0 0 0-7.5-7.5h-9.43c-4.143 0-7.5 3.358-7.5 7.5s3.357 7.5 7.5 7.5h9.43a7.5 7.5 0 0 0 7.5-7.5zM272.068 264.08c-4.143 0-7.5 3.358-7.5 7.5s3.357 7.5 7.5 7.5h34.888c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5zM400.305 307.996c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5h-8.172c-4.143 0-7.5 3.358-7.5 7.5s3.357 7.5 7.5 7.5z"
                                            fill="currentColor" opacity="1" data-original="currentColor">
                                        </path>
                                    </g>
                                </svg>
                            </div>
                            <div class="service-item-content">
                                @foreach ($serviceContents as $content)
                                    @if ($content->header)
                                        <h3 class="service-heading">
                                            {{ $content->header }}
                                        </h3>
                                    @endif
                                    <p>{{ $content->content }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
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
