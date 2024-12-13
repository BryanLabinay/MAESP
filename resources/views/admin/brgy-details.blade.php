 <x-app-layout>
     @section('css')
         {{-- Data Table --}}
         <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
         <link rel="stylesheet" href="https://code.jquery.com/jquery-3.7.1.js">
         <link rel="stylesheet"
             href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js">
         <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/js/dataTables.js">
         <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js">

     @endsection
     @section('content_header')
         <h5 class="fw-semibold text-md">Barangay</h5>
         <hr class="mt-0">
     @stop
     @section('content')

         <div class="row mb-2">
             <div class="col-md-12 d-flex justify-content-start">
                 <form action="{{ route('barangays.index') }}" method="get">
                     <button type="submit" class="btn btn-primary"><i class="fa-solid fa-arrow-left me-1"></i>
                         Back</button>
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
                             <div class="d-flex flex-column"> <!-- Changed flex direction to column -->
                                 <div class="d-flex flex-row">
                                     <h1 class="fw-bold me-2">BARANGAY</h1>
                                     <h1 class="fw-bold text-uppercase">{{ $barangay->name }}</h1>
                                 </div>
                                 <h6>Total Farmers: 60</h6> <!-- Moved below the h1 tags -->
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             {{-- <hr class="mt-2 text-danger"> --}}
             <div class="row mb-2 mt-2">
                 {{-- <div class="col-6 d-flex justify-content-start">
                     <form action="" method="GET" class="form-inline">
                         <div class="form-group">
                             <input type="text" name="name" class="form-control me-2" style="width: 400px;"
                                 placeholder="Search Farmers" value="">

                         </div>
                         <button type="submit" class="btn btn-primary fw-semibold"><i
                                 class="fa-solid fa-magnifying-glass me-1"></i>Search</button>
                     </form>
                 </div> --}}
                 <div class="col-12 d-flex justify-content-end">
                     <button type="submit" class="btn btn-success me-1"><i class="fa-solid fa-file-arrow-down me-1"></i>
                         Export Excel</button>
                     <button type="submit" class="btn btn-danger"><i class="fa-solid fa-file-pdf me-1"></i> Generate
                         PDF</button>
                 </div>
                 <hr class="mt-1 text-black">
             </div>
             {{-- <hr class="mt-0"> --}}
             <div class="row p-0">
                 <div class="col-12 bg-white p-1 mx-2 rounded-1 shadow-sm">
                     <table class="table table-bordered table-striped" id="myTable">
                         <thead class="table-success">
                             <tr>
                                 <th>No.</th>
                                 <th>Farmers Name</th>
                                 <th>Address</th>
                                 <th>Contact Number</th>
                                 {{-- <th>Acres Own</th> --}}
                                 <th>Farm Type</th>
                                 {{-- <th>Ownership Type</th> --}}
                             </tr>
                         </thead>
                         <tbody>
                             @php $counter = 1; @endphp
                             @foreach ($farmers as $farmer)
                                 <tr>
                                     <td class="text-center">{{ $counter++ }}</td>
                                     <td>{{ $farmer->first_name }} {{ $farmer->middle_name }} {{ $farmer->last_name }}
                                         {{ $farmer->suffix }}</td>
                                     <td>{{ $farmer->address }}</td>
                                     <td>{{ $farmer->phone_number }}</td>
                                     {{-- <td>{{ $farmer->farm_size }}</td> --}}
                                     <td>
                                         @if ($farmer->parcels)
                                             @foreach ($farmer->parcels as $parcel)
                                                 <p><strong>Farm Location:</strong>
                                                     {{ htmlspecialchars($parcel['farm_location']) }}</p>
                                                 <p><strong>Farm Area:</strong> {{ $parcel['farm_area'] }} acres</p>
                                                 <p><strong>Farm Type:</strong> {{ $parcel['farm_type'] ?? 'N/A' }}</p>
                                                 <p><strong>Crop Commodity:</strong> {{ $parcel['crop_commodity'] }}</p>
                                                 <hr>
                                             @endforeach
                                         @else
                                             <p>No parcels available</p>
                                         @endif
                                     </td>
                                     {{-- <td>{{ $farmer->ownership_type }}</td> --}}
                                 </tr>
                             @endforeach
                         </tbody>

                     </table>
                 </div>
             </div>
         </div>


     @endsection
     @section('js')
         <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
         <script src="https://code.jquery.com/jquery-3.7.1.min.js"
             integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
         <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

         <script>
             new DataTable('#myTable', {
                 layout: {
                     topStart: {
                         pageLength: {
                             menu: [10, 25, 50, 100]
                         }
                     },
                     topEnd: {
                         search: {
                             placeholder: 'Type search here'
                         }
                     },
                     bottomEnd: {
                         paging: {
                             buttons: 3
                         }
                     }
                 },
                 language: {
                     lengthMenu: " _MENU_ Records per page",
                     info: "Showing _START_ to _END_ of _TOTAL_ records",
                     infoEmpty: "No records available",
                     infoFiltered: "(filtered from _MAX_ total records)",
                     search: "Search:",
                     paginate: {
                         first: "First",
                         last: "Last",
                         next: "Next",
                         previous: "Previous"
                     }
                 }
             });
         </script>

     @endsection

 </x-app-layout>
