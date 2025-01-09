<?php

namespace App\Http\Controllers\Barangay;

use App\Exports\CroppingExport;
use App\Exports\FarmersExport;
use App\Http\Controllers\Controller;
use App\Models\Farmer;
use App\Models\Cropping;
use Barryvdh\DomPDF\Facade\pdf;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ExportController extends Controller
{


    public function exportFarmersPDF()
    {
        $farmers = Farmer::all();

        $pdf = PDF::loadView('barangay.export.export-pdf', compact('farmers'));

        return $pdf->stream('farmers-list.pdf');
    }

    public function exportFarmersExcel()
    {
        return Excel::download(new FarmersExport, 'farmers-list.xlsx');
    }

     public function exportCroppingPDF()
    {
        $croppings = Cropping::all();

        $pdf = PDF::loadView('barangay.export.cropping-pdf', compact('croppings'));

        return $pdf->stream('cropping.pdf');
    }

    public function exportCroppingExcel()
    {
        return Excel::download(new CroppingExport, 'cropping-list.xlsx');
    }
}
