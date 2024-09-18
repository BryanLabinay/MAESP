<?php

namespace App\Http\Controllers\Barangay;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FarmersControlller extends Controller
{
    public function index() {
        return view('barangay.farmers.create');
    }

    public function show() {
        return view('barangay.farmers.list');
    }
}
