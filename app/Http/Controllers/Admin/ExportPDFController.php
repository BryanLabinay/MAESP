<?php

namespace App\Http\Controllers\Admin;

use App\Exports\BarangayExport;
use App\Http\Controllers\Controller;
use App\Models\Farmer;
use Barryvdh\DomPDF\Facade\pdf;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ExportPDFController extends Controller
{

    public function exportBarangayPDF()
    {
        $farmers = Farmer::all();

        $pdf = PDF::loadView('admin.pdf.export-pdf', compact('farmers'));

        return $pdf->stream('farmers-list.pdf');
    }


    public function exportBarangayExcel()
    {
        return Excel::download(new BarangayExport, 'farmers-list.xlsx');
    }
}
