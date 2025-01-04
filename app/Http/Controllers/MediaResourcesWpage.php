<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MediaTitle;
use App\Models\Media;

class MediaResourcesWpage extends Controller
{


    public function show($id)
    {
        $mediaTitle = MediaTitle::findOrFail($id);

        $media = Media::where('media_id', $mediaTitle->id)->get();

        return view('user.media-resources', compact('mediaTitle', 'media'));
    }


}


