<?php

namespace App\Exports;

use App\Models\Farmer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FarmersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Farmer::select('id', 'first_name', 'middle_name', 'last_name', 'sex', 'phone_number', 'birth_date', 'address')->get();
    }

    public function headings(): array
    {
        return ['ID', 'First Name', 'Middle Name', 'Last Name', 'Sex', 'Contact', 'Date of Birth', 'Address'];
    }
}
