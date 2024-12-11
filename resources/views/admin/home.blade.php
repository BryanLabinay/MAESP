<x-app-layout>
    @section('css')
        {{-- Boostrap CDN --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    @stop
    @section('content_header')
        <h5 class="fw-semibold text-md">Dashboard</h5>
        <hr class="mt-0">
    @stop
    @section('content')
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <a href="{{ route('barangays.index') }}" class="text-decoration-none">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $countall }}</h3>
                                <p class="fw-bold">Total Barangay</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <a href="{{ route('barangays.index') }}" class="text-decoration-none">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $farmer }}</h3>
                                {{-- <sup style="font-size: 20px">%</sup> --}}
                                <p class="fw-bold">Total Farmers</p>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <a href="#" class="text-decoration-none">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>44</h3>

                                <p>Total Reports</p>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <a href="#" class="text-decoration-none">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>65</h3>

                                <p>News and Update</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    @endsection
</x-app-layout>
