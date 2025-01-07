<x-app-layout>
    @section('css')
        {{-- Boostrap CDN --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        {{-- Google Fonts --}}
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
        <style>
            body {
                font-family: 'Poppins';
            }
        </style>
    @stop

    @section('content_header')
        <h5 class="fw-semibold text-md">Services</h5>
        <hr class="mt-0">
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                                <tr>
                                    <td>{{ $service->header }}</td>
                                    <td>{{ $service->content }}</td>
                                    <td>
                                        {{-- @foreach (json_decode($service->images, true) as $image)
                                            <a href="{{ asset('media/service/' . $image) }}"
                                                target="_blank">{{ $image }}</a><br>
                                        @endforeach --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Include DataTables JS -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

        <!-- Initialize DataTable -->
        <script>
            $(document).ready(function() {
                $('#serviceTable').DataTable();
            });
        </script>
    @stop

</x-app-layout>
