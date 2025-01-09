<?php

namespace App\Exports;

use App\Models\Cropping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CroppingExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Retrieve cropping data and process parcels correctly
        return Cropping::all()->flatMap(function ($cropping) {
            // Ensure the parcels field is an array
            if (is_array($cropping->parcels) && count($cropping->parcels) > 0) {
                // Loop through each parcel and map data
                return collect($cropping->parcels)->map(function ($parcel) use ($cropping) {
                    return [
                        'ID' => $cropping->id,
                        'First Name' => $cropping->first_name,
                        'Middle Name' => $cropping->middle_name,
                        'Last Name' => $cropping->last_name,
                        'Contact' => $cropping->phone_number,
                        'Address' => $cropping->address,
                        'Farm Location' => $parcel['farm_location'] ?? '',
                        'Variety' => $parcel['variety'] ?? '',
                        'Farm Type' => $parcel['farm_type'] ?? '',
                        'Area' => $parcel['area'] ?? '',
                        'Sowing Date' => $parcel['sowing_date'] ?? '',
                        'Transplanting Date' => $parcel['transplanting_date'] ?? '',
                        'Date Harvested' => $parcel['date_harvested'] ?? '',
                        'Gross Yield' => $parcel['gross'] ?? '',
                        'Average Yield' => $parcel['average'] ?? '',
                        'Crop Commodity' => $parcel['crop_commodity'] ?? ''
                    ];
                });
            }
            return collect([]); // Return empty collection if no parcels
        });
    }

    /**
     * Set the headings for the export
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID', 'First Name', 'Middle Name', 'Last Name', 'Contact', 'Address',
            'Farm Location', 'Variety', 'Farm Type', 'Area', 'Sowing Date',
            'Transplanting Date', 'Date Harvested', 'Gross Yield', 'Average Yield', 'Crop Commodity'
        ];
    }
}
