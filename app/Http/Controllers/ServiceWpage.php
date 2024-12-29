<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceContent;
use Illuminate\Http\Request;

class ServiceWpage extends Controller
{
    public function index($id)
    {
        $service = Service::findOrFail($id);

        $serviceContents = ServiceContent::where('service_id', $id)->get();

        return view('user.service', compact('service', 'serviceContents'));
    }

}

