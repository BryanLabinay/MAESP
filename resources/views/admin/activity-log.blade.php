<x-app-layout>
    @section('css')
        {{-- Boostrap CDN --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        {{-- Google Fonts --}}
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">

        {{-- Database --}}
        <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
        <link rel="stylesheet" href="https://code.jquery.com/jquery-3.7.1.js">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/js/dataTables.js">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js">

        <style>
            body {
                font-family: 'Poppins';
            }
        </style>
    @stop

    @section('content_header')
        <h5 class="fw-semibold text-md">Activity Log</h5>
        <hr class="mt-0">
    @stop

    @section('content')
        <div class="container-fluid">
            {{-- <h1>Activity Log</h1> --}}
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Event</th>
                        <th>Name</th>
                        <th>Causer</th>
                        <th>Description</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @php $counter = 1; @endphp

                    @forelse ($activities as $activity)
                        <tr>
                            <td class="text-center">{{ $counter++ }}</td>
                            <td>{{ $activity->description }}</td>
                            <td>
                                @if ($activity->subject)
                                    @if ($activity->subject_type === 'App\Models\Farmer')
                                        {{ $activity->subject->first_name }}
                                    @elseif($activity->subject_type === 'App\Models\User')
                                        {{ $activity->subject->name }}
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if ($activity->causer)
                                    {{ $activity->causer->name ?? 'Unknown' }}
                                @else
                                    System
                                @endif
                            </td>

                            <td>
                                @if ($activity->description === 'created')
                                    Farmer has been added
                                @elseif ($activity->description === 'updated')
                                    Farmer information has been updated
                                @elseif ($activity->description === 'logged in')
                                    User {{ optional($activity->causer)->name }} has logged in
                                @elseif ($activity->description === 'logged out')
                                    User {{ optional($activity->causer)->name }} has logged out
                                @else
                                    {{ $activity->description }}
                                @endif


                            </td>
                            <td>{{ $activity->created_at->format('F j, Y g:i:s A') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No activity logs found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- <div class="mt-3">
                {{ $activities->links() }}
            </div> --}}
        </div>
    @endsection
    @section('js')
        {{-- Js Script --}}
        <script src="{{ url('Js/script.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
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
