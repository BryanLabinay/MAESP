<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsDisease;
use Illuminate\Http\Request;

class PestDiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pest = NewsDisease::orderBy('date', 'desc')->get();
        return view('admin.News.Pest.index', compact('pest'));
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
        // Validate form data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|text',
            'date' => 'required|date',
            'images' => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Initialize the image path as null
        $imagePath = null;

        // Store the uploaded image if it exists
        if ($request->hasFile('images')) {
            $imagePath = $request->file('images')->store('news-images', 'public');
        }

        // Save data to the database
        $news = NewsDisease::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'date' => $validatedData['date'],
            'image_path' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'News has been added successfully!');
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
