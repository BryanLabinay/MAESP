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
                                 class="rounded-circle border border-1" width="110" height="110">
                         </div>
                         <div class="col-9 d-flex align-items-center">
                             <div class="d-flex flex-row">
                                 <h1 class="fw-bold me-2">BARANGAY</h1>
                                 <h1 class="fw-bold text-uppercase">{{ $barangay->name }}</h1>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             {{-- <hr class="mt-2 text-danger"> --}}
             <div class="row mb-2 mt-2">
                 <div class="col-12 d-flex justify-content-end">
                     <form action="" method="GET" class="form-inline">
                         <div class="form-group">
                             <input type="text" name="name" class="form-control me-2" placeholder="Search Farmers"
                                 value="">
                         </div>
                         <button type="submit" class="btn btn-primary fw-semibold"><i
                                 class="fa-solid fa-magnifying-glass me-1"></i>Search</button>
                     </form>
                 </div>
             </div>
             {{-- <hr class="mt-0"> --}}
             <div class="row p-0">
                 <div class="col-12 bg-success p-1 mx-2 rounded-1">
                     <table class="table table-bordered table-striped">
                         <thead class="table-success">
                             <tr>
                                 <th>Farmers Name</th>
                                 <th>Address</th>
                                 <th>Contact Number</th>
                                 <th>Acres Own</th>
                                 <th>Farm Type</th>
                                 <th>Ownership Type</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($farmers as $farmer)
                                 <tr>
                                     <td>{{ $farmer->first_name }} {{ $farmer->middle_name }} {{ $farmer->last_name }}
                                         {{ $farmer->suffix }}</td>
                                     <td>{{ $farmer->address }}</td>
                                     <td>{{ $farmer->phone_number }}</td>
                                     <td>{{ $farmer->farm_size }}</td>
                                     <td>{{ $farmer->crop_type }}</td>
                                     <td>{{ $farmer->ownership_type }}</td>
                                 </tr>
                             @endforeach

                         </tbody>
                     </table>
                 </div>
             </div>


             {{-- <div class="row mb-2">
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
             </div> --}}
         </div>


     @endsection

 </x-app-layout>
