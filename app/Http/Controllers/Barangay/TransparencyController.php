<?php

namespace App\Http\Controllers\Barangay;

use App\Http\Controllers\Controller;
use App\Models\TransparencyTitle;
use App\Models\Transparency;
use Illuminate\Http\Request;

class TransparencyController extends Controller
{


    public function index($id){

        $title = TransparencyTitle::findOrFail($id);

        $content = Transparency::where('transparency_id', $title->id)->get();

        return view('barangay.Transparency.transparency', compact('title', 'content'));

}

}
