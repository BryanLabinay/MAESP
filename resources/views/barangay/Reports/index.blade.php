<!-- filepath: /C:/xampp/htdocs/LARAVEL/MAESP/resources/views/reports/index.blade.php -->
@extends('layouts.barangay')

@section('content')
    <div class="container">
        <h1>Reports</h1>
        <a href="{{ route('send-reports.create') }}" class="btn btn-primary">Create Report</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>File</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reports as $report)
                    <tr>
                        <td>{{ $report->id }}</td>
                        <td>{{ $report->title }}</td>
                        <td>{{ $report->description }}</td>
                        <td><a href="{{ asset('media/reports/' . $report->file) }}" target="_blank">{{ $report->file }}</a>
                        </td>
                        <td>

                            <a href="{{ route('send-reports.edit', $report->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('send-reports.destroy', $report->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
