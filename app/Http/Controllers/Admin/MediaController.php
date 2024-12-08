<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mediaItems = Media::all();
        return view('admin.Media.index', compact('mediaItems'));
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
        $request->validate([
            'file.*' => 'required|mimes:jpg,jpeg,png,pdf,docx,xlsx,txt', // Validate each file
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $uploadedFiles = $request->file('file'); // Retrieve multiple files
        $mediaRecords = [];

        foreach ($uploadedFiles as $file) {
            // Store each file in the `public/uploads` directory
            $filePath = $file->store('uploads', 'public');

            // Save each file information to the database
            $mediaRecords[] = Media::create([
                'title' => $request->input('title', $file->getClientOriginalName()),
                'file' => $filePath,
                'description' => $request->input('description', $file->getClientOriginalName()),
                'user_id' => Auth::id(),
            ]);
        }

        return redirect()->back();
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
