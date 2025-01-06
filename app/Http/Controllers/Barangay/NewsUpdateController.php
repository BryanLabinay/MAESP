<?php

namespace App\Http\Controllers\Barangay;

use App\Http\Controllers\Controller;
use App\Models\NewsTitle;
use App\Models\News;
use Illuminate\Http\Request;

class NewsUpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $title = NewsTitle::findOrFail($id);
        $content = News::where('news_id', $title->id)->get();
        return view('barangay.News.index', compact('title', 'content'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
