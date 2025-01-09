<?php

namespace App\Http\Controllers\Barangay;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceContent;
use Illuminate\Http\Request;

class ServicesController extends Controller
{

    public function index($id)
    {
        $service = Service::findOrFail($id);

        $serviceContents = ServiceContent::where('service_id', $id)->get();

        return view('barangay.Service.services', compact('service', 'serviceContents'));
    }
}
