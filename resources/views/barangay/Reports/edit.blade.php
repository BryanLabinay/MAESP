@extends('layouts.barangay')

@section('content')
    <h6 class="mt-4"><i class="fa-solid fa-asterisk me-1"></i>Edit Reports</h6>
    <hr class="mt-0">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
    <h6 class="">Report</h6>

    </div>

        <div class="card-body">
            <form action="{{ route('send-reports.update', $report->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Title Input -->
                <div class="mb-4">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $report->title }}" required>
                    @error('title')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description Input -->
                <div class="mb-4">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required>{{ $report->description }}</textarea>
                    @error('description')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- File Input -->
                <div class="mb-4">
                    <label for="file" class="form-label">File</label>
                    <input type="file" class="form-control" id="file" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx">
                    <small class="form-text text-muted">Current file: <a href="{{ asset('media/reports/' . $report->file) }}" target="_blank">{{ $report->file }}</a></small>
                    @error('file')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary px-4 py-2">Update Report</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection



