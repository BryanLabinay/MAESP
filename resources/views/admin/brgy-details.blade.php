 <x-app-layout>
     @section('content_header')
         <h5 class="fw-semibold text-md">Barangay</h5>
         <hr class="mt-0">
     @stop
     @section('content')

         <div class="row mb-2">
             <div class="col-md-12 d-flex justify-content-start">
                 <form action="{{ route('barangays.index') }}" method="get">
                     <button type="submit" class="btn btn-primary"><i class="fa-solid fa-arrow-left me-1"></i> Back</button>
                 </form>
             </div>
         </div>

         <div class="row p-2 bg-white shadow-sm">
             <div class="bg-secondary bg-opacity-10 rounded-1 p-2">
                 <div class="col-sm-6">
                     <div class="row">
                         <div class="col-sm-3">
                             <img src="{{ asset('assets/img/masp-logo.jpg') }}" alt="logo"
                                 class="rounded-circle border border-1" width="120" height="120">
                         </div>
                         <div class="col-6 d-flex align-items-center">
                             <h1 class="fw-bold">Barangay</h1>
                         </div>
                     </div>
                 </div>
             </div>
             <hr class="mt-2 text-danger">

             <div class="row mb-2">
                 <div class="col-12">
                     <h5 class="fw-semibold">Local Farmers Records</h5>
                 </div>
             </div>
             <div class="row px-4">
                 <div class="col-3">
                     <h6 class="fw-semibold">Farmers</h6>
                     @if ($farmers->isEmpty())
                         <p class="fw-bold"><i class="fa-solid fa-caret-right me-1"></i>Total: <b
                                 class="bg-secondary px-2 rounded-1">0</b></p>
                     @else
                         <p class="fw-bold"><i class="fa-solid fa-caret-right me-1"></i>Total: <b
                                 class="bg-secondary px-2 rounded-1">{{ $farmers->count() }}</b></p>
                     @endif
                 </div>
                 <div class="col-3">
                     <h6 class="fw-semibold">Total Land</h6>
                     @if ($farmers->isEmpty())
                         <p>No farmers found for this barangay.</p>
                     @else
                         @php
                             $totalFarmSize = $farmers->sum('farm_size'); // Compute the total farm size
                         @endphp
                         <p class="fw-bold"><i class="fa-solid fa-caret-right me-1"></i>Total: <b
                                 class="bg-secondary px-2 rounded-1 me-1">{{ $totalFarmSize }}</b>hectares</p>
                     @endif
                 </div>
             </div>
         </div>


     @endsection

 </x-app-layout>
