<?php

namespace App\Http\Controllers\Barangay;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MediaTitle;
use App\Models\Media;


class MediaCtrl extends Controller
{


public function index($id){

        $mediaTitle = MediaTitle::findOrFail($id);

        $media = Media::where('media_id', $mediaTitle->id)->get();

        return view('barangay.media.media', compact('mediaTitle', 'media'));

}

}
