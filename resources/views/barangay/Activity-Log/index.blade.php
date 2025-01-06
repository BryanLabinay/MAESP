@extends('layouts.barangay')

@section('content')
    <div class="page-content scrollable-content bg-light">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Activity Log</h2>
            </div>
        </div>

        <div class="container-fluid mt-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-danger">
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Subject Type</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $perPage = $logs->perPage();
                                $currentPage = $logs->currentPage();
                                $counter = ($currentPage - 1) * $perPage + 1;
                            @endphp
                            @forelse ($logs as $log)
                                @php
                                    $description = $log->description;
                                    $subjectType = $log->subject_type;
                                    $module = isset($activities[$subjectType]) ? $activities[$subjectType] : null;

                                    // Modify description based on the subject type and the action
                                    if ($module == 'User Module' && $description == 'created') {
                                        $description = 'New User Registered by ' . optional($log->causer)->name;
                                    } elseif ($module == 'User Module' && $description == 'updated') {
                                        $description = 'User updated their information';
                                    } elseif ($module == 'Farmer Module' && $description == 'created') {
                                        $description = 'New Farmer Registered by ' . optional($log->causer)->name;
                                    } elseif ($module == 'Farmer Module' && $description == 'updated') {
                                        $description = 'Farmer information updated';
                                    }
                                    // If the description is 'logged in', display a custom message
                                    elseif ($description == 'logged in') {
                                        $description = 'User ' . optional($log->causer)->name . ' logged in successfully';
                                    }
                                @endphp
                                <tr class="text-center">
                                    <td>{{ $counter++ }}</td>
                                    <td>{{ $activities[$log->subject_type] ?? 'Unknown Module' }}</td>
                                    <td>{{ $description }}</td>
                                    <td>{{ \Carbon\Carbon::parse($log->created_at)->format('F d, Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($log->created_at)->format('h:i A') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No Activity Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $logs->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
