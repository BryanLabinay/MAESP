<!-- resources/views/farmers/index.blade.php -->
<x-app-layout>

    @section('content')
        {{-- <h1>Farmers in Barangay ID: {{ $user_id }}</h1> --}}

        @if ($farmers->isEmpty())
            <p>No farmers found for this barangay.</p>
        @else
            <ul>
                @foreach ($farmers as $farmer)
                    <li>
                        {{ $farmer->first_name }}
                        <br>
                    </li>
                @endforeach
            </ul>
        @endif
    @endsection

</x-app-layout>
