<x-app-layout>
    @section('css')
        <!-- Bootstrap CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Poppins', sans-serif;
                background-color: #f8f9fa;
            }

            .card {
                border-radius: 12px;
            }

            .form-control {
                border-radius: 8px;
            }

            button.btn-primary {
                background-color: #007bff;
                border-color: #007bff;
                transition: background-color 0.3s ease, box-shadow 0.3s ease;
            }

            button.btn-primary:hover {
                background-color: #0056b3;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            }

            .card-title {
                font-weight: 700;
                color: #343a40;
            }

            .form-label {
                font-weight: 500;
            }

            img.img-thumbnail {
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            }
        </style>
    @stop

    @section('content_header')
        <h5 class="fw-semibold text-md text-secondary">Edit Portfolio</h5>
        <hr class="mt-0 mb-4">
    @stop

    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-4">
                            <!-- Title -->
                            <h4 class="card-title text-center mb-4">Edit Portfolio</h4>

                            <!-- Form -->
                            <form action="{{ route('portfolio.update', $portfolio->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Title Input -->
                                <div class="mb-4">
                                    <label for="title" class="form-label text-secondary">Title</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        value="{{ $portfolio->title }}" placeholder="Enter portfolio title" required>
                                </div>

                                <!-- Description Textarea -->
                                <div class="mb-4">
                                    <label for="description" class="form-label text-secondary">Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="5"
                                        placeholder="Enter a detailed description of the portfolio" required>{{ $portfolio->description }}</textarea>
                                </div>

                                <!-- Image Input -->
                                <div class="mb-4">
                                    <label for="image" class="form-label text-secondary">Upload New Image</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                    <small class="text-muted">Supported formats: JPG, PNG (Max: 2MB)</small>
                                </div>

                                <!-- Current Image Preview -->
                                <div class="mb-4">
                                    <label class="form-label text-secondary">Current Image</label>
                                    <div class="d-flex align-items-center">
                                        @if ($portfolio->image)
                                            <img src="{{ asset('images/' . $portfolio->image) }}" alt="Portfolio Image"
                                                class="img-thumbnail rounded me-3"
                                                style="width: 120px; height: 90px; object-fit: cover;">
                                        @else
                                            <p class="text-muted mb-0">No image available</p>
                                        @endif
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg">Update Portfolio</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @stop
</x-app-layout>
