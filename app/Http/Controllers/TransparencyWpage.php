<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransparencyTitle;
use App\Models\Transparency;



class TransparencyWpage extends Controller
{

    public function show($id)
    {
        $title = TransparencyTitle::findOrFail($id);

        $content = Transparency::where('transparency_id', $title->id)->get();

        return view('user.Transparency.transparency', compact('title', 'content'));
    }

}
