<?php

namespace App\Http\Controllers\Admin;

use App\Models\MarketPrices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MarketPricesCTRL extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prices = MarketPrices::latest()->get();
        return view('admin.News.Market-Prices.index', compact('prices'));
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
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|text',
            'date' => 'required|date',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048', // Image is now optional
        ]);

        // Handle file upload (if any)
        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('news_images', 'public')
            : null;

        // Create a new News record in the database
        MarketPrices::create([
            'title' => $request->title,
            'content' => $request->content,
            'date' => $request->date,
            'image' => $imagePath,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'News created successfully!');
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
