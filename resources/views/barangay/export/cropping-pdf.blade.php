<h1>Cropping List</h1>

@if ($croppings->isEmpty())
    <p>No croppings found.</p>
@else
    <ul>
        @foreach($croppings as $cropping)
            <li>
                <strong>{{ $cropping->first_name }} {{ $cropping->last_name }}</strong> ({{ $cropping->phone_number }})<br>
                Address: {{ $cropping->address }}<br>

                @if(is_array($cropping->parcels) && count($cropping->parcels) > 0)
                    <ul>
                        @foreach($cropping->parcels as $parcel)
                            <li>
                                <strong>Farm Location:</strong> {{ $parcel['farm_location'] ?? 'N/A' }}<br>
                                <strong>Variety:</strong> {{ $parcel['variety'] ?? 'N/A' }}<br>
                                <strong>Farm Type:</strong> {{ $parcel['farm_type'] ?? 'N/A' }}<br>
                                <strong>Area:</strong> {{ $parcel['area'] ?? 'N/A' }}<br>
                                <strong>Sowing Date:</strong> {{ $parcel['sowing_date'] ?? 'N/A' }}<br>
                                <strong>Transplanting Date:</strong> {{ $parcel['transplanting_date'] ?? 'N/A' }}<br>
                                <strong>Date Harvested:</strong> {{ $parcel['date_harvested'] ?? 'N/A' }}<br>
                                <strong>Gross Yield:</strong> {{ $parcel['gross'] ?? 'N/A' }}<br>
                                <strong>Average Yield:</strong> {{ $parcel['average'] ?? 'N/A' }}<br>
                                <strong>Crop Commodity:</strong> {{ $parcel['crop_commodity'] ?? 'N/A' }}<br>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No parcels available.</p>
                @endif
            </li>
        @endforeach
    </ul>
@endif
