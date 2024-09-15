<x-app-layout>
    @section('css')
    {{-- Boostrap CDN --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}

    @stop

    @section('content_header')
    <h5 class="fw-semibold text-md">Brgy. {{ $barangay_list->brgy_name }}</h5>
    <hr class="mt-0">
    @stop

    @section('content')

    <div class="">
        <div class="row px-3">
            <div class="col-12 mb-3">
                <div class="d-flex justify-content-start p-0">
                    <a href="{{ route('barangays.index') }}" class="btn btn-primary"><i
                            class="fa-solid fa-arrow-left-long me-1"></i>Back</a>
                </div>
            </div>
        </div>

        <div class="row bg-white shadow-sm px-3">
            {{-- <hr class="mt-0"> --}}
            <div class="col-6 d-flex align-items-center py-3">
                <img src="{{ $barangay_list->image ? asset('brgy_images/' . $barangay_list->image) : asset('assets/img/offices/default.jpg') }}"
                    class="rounded-circle border border-success border-2 me-3" width="150" height="150" alt="Image of {{ $barangay_list->brgy_name }}"
                    style="object-fit: cover;">
                <div>
                    <h2 class="mb-0">Barangay {{ $barangay_list->brgy_name }}</h2>
                    <h6 class="mb-0">{{ $barangay_list->municipality }}</h6>
                    <h6 class="mb-0">Postal-Code: {{ $barangay_list->zip_code }}</h6>
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex justify-content-end py-3 ">
                    <button class="btn btn-primary px-3 me-2 fw-semibold">Edit</button>
                    <button class="btn btn-danger fw-semibold">Remove</button>
                </div>
            </div>
            <hr>
            {{-- <div class="row px-4">
                <div class="col-2">
                  <h6>Farmers: 1000</h6>
                </div>
                <div class="col-2">
                    <h6>Household: 2500</h6>
                  </div>
                  <div class="col-2">
                    <h6>Rotor: 20</h6>
                  </div>
            </div> --}}
        </div>
    </div>
    @stop


</x-app-layout>
