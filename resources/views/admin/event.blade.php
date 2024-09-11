<x-app-layout>
    @section('css')
{{-- Boostrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        {{-- Google Fonts --}}
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <style>
           body{
            font-family: 'Poppins';
           }
        </style>
    @stop


    @section('content_header')
        <h5 class="fw-semibold">Event</h5>
        <hr class="mt-0">
    @stop

    @section('content')
    <div class="container-fluid ">
        <div class="row">
            <div class="col-7 d-flex justify-content-center">
                <div class="p-3 text-dark bg-secondary bg-opacity-10" style="width: 650px;">
                    <h5 class="">Event Form</h4>
                    <hr class="mt-0">
                    <form method="post" action="{{ route('store.event') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Title -->
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" rows="1"
                                style="height: auto; overflow-y: hidden;" required></textarea>
                        </div>

                        <!-- File Upload -->
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="img" id="" class="form-control">
                        </div>
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
            {{-- <div class="col-lg-5 p-0 mb-2">
                <div class="bg-secondary bg-opacity-25 p-0 rounded-2 text-black">
                    <h5 class="text-center">Event List</h5>
                </div>
                @forelse ($eventlist as $event)
                    <div class="bg-secondary bg-opacity-25 border rounded-2 p-2 d-flex align-items-center shadow-sm">
                        <div class="me-3">
                            <img src="{{ asset('uploads/' . $event->img) }}" class="rounded-circle" height="50"
                                width="50" alt="{{ $event->title }}">
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="m-0 text-dark fw-bolder">{{ $event->title }}</h6>
                                <small class="text-muted">{{ $event->formattedTimestamp }}</small>
                            </div>
                            <p class="text-muted m-0">
                                {{ strlen($event->description) > 35 ? substr($event->description, 0, 35) . '...' : $event->description }}
                            </p>
                        </div>
                        <div class="d-flex align-items-center ms-3">
                            <a href="{{ route('event.edit', $event->id) }}" class="btn btn-sm btn-outline-primary me-2">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('delete-event', $event->id) }}" method="post" class="m-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-5">
                        <div class="bg-secondary bg-opacity-25 rounded-2 shadow-sm">
                            <h5 class="text-center">No Events</h5>
                        </div>
                    </div>
                @endforelse
            </div> --}}
        </div>
    </div>
@stop
</x-app-layout>
