<!-- filepath: /C:/xampp/htdocs/LARAVEL/MAESP/resources/views/reports/edit.blade.php -->
@extends('layouts.barangay')

@section('content')
    <div class="container">
        <h1>Edit Report</h1>
        <form action="{{ route('send-reports.update', $report->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $report->title }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $report->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">File</label>
                <input type="file" class="form-control" id="file" name="file">
                <small>Current file: <a href="{{ asset('media/reports/' . $report->file) }}"
                        target="_blank">{{ $report->file }}</a></small>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
