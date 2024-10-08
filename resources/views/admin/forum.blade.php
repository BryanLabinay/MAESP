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
        <h5 class="fw-semibold text-md">Forum</h5>
        <hr class="mt-0">
    @stop

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    @foreach ($forums as $forum)
                        <a href="#" class="text-decoration-none">
                            <div class="bg-secondary bg-opacity-25 text-black py-0 px-1 rounded-1 mb-1">
                                <h6>Name: {{ $forum->name }}</h6>
                                <h6>Subject: {{ $forum->subject }}</h6>
                                <p>Description: {{ $forum->description }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    @stop
</x-app-layout>
