<x-app-layout>
    @section('css')
    {{-- Boostrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    @stop

    @section('content_header')
    <h5 class="fw-semibold text-md">Brgy. {{ $barangay_list->brgy_name }}</h5>
    <hr class="mt-0">

    @section('content')

    <div class="row px-3">
        <div class="col-12 mb-3">
            <div class="d-flex justify-content-start">
                <a href="{{ route('barangays.index') }}" class="btn btn-primary"><i
                        class="fa-solid fa-arrow-left-long me-1"></i>Back</a>
            </div>
        </div>
        {{-- <hr class="mt-0"> --}}
        <div class="col-6 d-flex align-items-center py-3">
            <img src="{{ $barangay_list->image ? asset('brgy_images/' . $barangay_list->image) : asset('assets/img/offices/default.jpg') }}"
                class="rounded-circle me-3" width="150" height="150" alt="Image of {{ $barangay_list->brgy_name }}"
                style="object-fit: cover;">
            <div>
                <h1 class="mb-0">Barangay {{ $barangay_list->brgy_name }}</h1>
                <h5 class="mb-0">{{ $barangay_list->municipality }}</h5>
                <h5 class="mb-0">Postal Code {{ $barangay_list->zip_code }}</h5>
            </div>
        </div>


    </div>

    @stop


</x-app-layout>
