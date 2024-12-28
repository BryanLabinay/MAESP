<h1>Farmers List</h1>
@if ($farmers->isEmpty())
    <p>No farmers found.</p>
@else
    <ul>
        @foreach($farmers as $farmer)
            <li>{{ $farmer->first_name }}</li>
        @endforeach
    </ul>
@endif
