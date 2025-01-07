<x-app-layout>
    <div class="container mt-5">
        <h1 class="mb-4 text-center fw-bold">Reports</h1>
        <table id="reportsTable" class="table table-striped table-bordered">
            <thead class="table-success">
                <tr>
                    <th>Barangay</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>File</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($report as $data)
                    <tr>
                        <td>{{ $data->user->name }}</td>
                        <td>{{ $data->title }}</td>
                        <td>{{ $data->description }}</td>
                        <td>
                            <a href="{{ asset('media/reports/' . $data->file) }}" target="_blank"
                                class="btn btn-primary btn-sm">
                                View File
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Include necessary scripts for DataTable --}}
    @push('scripts')
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#reportsTable').DataTable({
                    responsive: true,
                    language: {
                        search: "Search:",
                        lengthMenu: "Show _MENU_ entries",
                        info: "Showing _START_ to _END_ of _TOTAL_ entries"
                    }
                });
            });
        </script>
    @endpush

    {{-- Include necessary CSS for DataTable --}}
    @push('styles')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    @endpush
</x-app-layout>
