<x-app-layout>
    @section('css')
        <!-- Bootstrap CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- Google Fonts -->
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
            rel="stylesheet">
        <style>
            body {
                font-family: 'Poppins';
            }
        </style>
    @stop

    @section('content')
        <div class="container-fluid">
            <h3>Add Content to Service: {{ $service->service_name }}</h3>

            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('service.content.store', $service->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="header" class="form-label">Header (Optional)</label>
                            <input type="text" class="form-control" id="header" name="header"
                                value="{{ old('header') }}" placeholder="Enter header">
                            @error('header')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="5" placeholder="Enter content">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image (Optional)</label>
                            <input type="file" class="form-control" id="image" name="image[]" accept="image/*"
                                multiple>
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Add Content</button>
                    </form>
                </div>

                <!-- Service Content List -->
                <div class="col-md-6">
                    <h5 class="fw-semibold text-md">Service Content List</h5>
                    <table id="serviceTable" class="table table-hover table-striped table-bordered">
                        <thead class="table-secondary">
                            <tr>
                                <th>Header</th>
                                <th>Content</th>
                                <th>Images</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                                <tr>
                                    <td>{{ $service->header }}</td>
                                    <td>{{ $service->content }}</td>
                                    <td>
                                        @if ($service->image)
                                            @foreach (json_decode($service->image, true) as $image)
                                                <img src="{{ asset('service_content/' . $image) }}" alt="{{ $image }}"
                                                    class="img-thumbnail" style="width: 100px; height: 100px; cursor: pointer;"
                                                    onclick="window.open('{{ asset('service_content/' . $image) }}', '_blank')">
                                            @endforeach
                                        @else
                                            <p>No images available</p>
                                        @endif
                                    </td>
                                    <td>
                                        <!-- View Button -->
                                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                            data-bs-target="#viewModal{{ $service->id }}">
                                            View
                                        </button>
                                    </td>
                                </tr>

                                <!-- View Modal -->
                                <div class="modal fade" id="viewModal{{ $service->id }}" tabindex="-1"
                                    aria-labelledby="viewModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="viewModalLabel">View Content</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Header:</strong> {{ $service->header }}</p>
                                                <p><strong>Content:</strong> {{ $service->content }}</p>
                                                <p><strong>Images:</strong></p>
                                                @if ($service->image)
                                                    <div class="d-flex flex-wrap">
                                                        @foreach (json_decode($service->image, true) as $image)
                                                            <div class="m-2">
                                                                <img src="{{ asset('service_content/' . $image) }} "
                                                                    alt="{{ $image }}" class="img-thumbnail"
                                                                    style="width: 100px; height: 100px; cursor: pointer;"
                                                                    onclick="window.open('{{ asset('service_content/' . $image) }}', '_blank')">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <p>No images available</p>
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <!-- Edit Button inside View Modal -->
                                                <button type="button" class="btn btn-warning"
                                                    data-bs-dismiss="modal" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $service->id }}">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal{{ $service->id }}" tabindex="-1"
                                    aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Content</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('service.content.update', $service->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="mb-3">
                                                        <label for="header" class="form-label">Header (Optional)</label>
                                                        <input type="text" class="form-control" id="header" name="header"
                                                            value="{{ old('header', $service->header) }}" placeholder="Enter header">
                                                        @error('header')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="content" class="form-label">Content</label>
                                                        <textarea class="form-control" id="content" name="content" rows="5"
                                                            placeholder="Enter content">{{ old('content', $service->content) }}</textarea>
                                                        @error('content')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="image" class="form-label">Replace Images (Optional)</label>
                                                        <input type="file" class="form-control" id="image" name="image[]"
                                                            accept="image/*" multiple>
                                                        <small class="text-muted">Leave empty to keep existing images.</small>
                                                        @error('image')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label>Existing Images</label>
                                                        <div class="d-flex flex-wrap">
                                                            @if ($service->image)
                                                                @foreach (json_decode($service->image, true) as $image)
                                                                    <div class="m-2">
                                                                        <img src="{{ asset('service_content/' . $image) }} "
                                                                            alt="Image" class="img-thumbnail"
                                                                            style="width: 100px; height: 100px;">
                                                                        <p class="text-center">
                                                                            <input type="checkbox" name="remove_images[]"
                                                                                value="{{ $image }}"> Remove
                                                                        </p>
                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                <p>No images available.</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-success">Update Content</button>
                                                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- jQuery and Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

        <script>
            var myModalElement = document.getElementById('editModal{{ $service->id }}');
            var myModal = new bootstrap.Modal(myModalElement);

            myModalElement.addEventListener('hidden.bs.modal', function () {
                var backdrop = document.querySelector('.modal-backdrop');
                if (backdrop) {
                    backdrop.remove();
                }

                location.reload();
            });
        </script>

    @stop
</x-app-layout>
