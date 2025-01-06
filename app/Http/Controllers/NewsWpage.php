<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsTitle;
use App\Models\News;

class NewsWpage extends Controller
{
    public function show($id)
    {
        $title = NewsTitle::findOrFail($id);

        $content = News::where('news_id', $title->id)->get();

        return view('user.news', compact('title', 'content'));
    }
}
