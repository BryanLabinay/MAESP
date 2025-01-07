<!-- filepath: /C:/xampp/htdocs/LARAVEL/MAESP/resources/views/reports/show.blade.php -->
@extends('layouts.barangay')

@section('content')
    <div class="container">
        <h1>{{ $report->title }}</h1>
        <p>{{ $report->description }}</p>
        <a href="{{ asset('media/reports/' . $report->file) }}" target="_blank">{{ $report->file }}</a>
        <br><br>
        <a href="{{ route('send-reports.index') }}" class="btn btn-secondary">Back to Reports</a>
    </div>
@endsection
