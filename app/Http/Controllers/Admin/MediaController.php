<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\MediaTitle;
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

    public function content($id)
    {
        $mediaTitle = MediaTitle::with('media')->findOrFail($id);

        return view('admin.Media.media-content', compact('mediaTitle'));
    }

    public function media()
    {
        $mediaItems = MediaTitle::all();
        return view('admin.Media.media-resources', compact('mediaItems'));
    }

    public function storeMedia(Request $request)
    {
        $request->validate([
            'media_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('media/image'), $imageName);
            $imagePath =$imageName;
        }

        $mediaTitle = new MediaTitle();
        $mediaTitle->media_name = $request->input('media_name');
        $mediaTitle->description = $request->input('description');
        $mediaTitle->image = $imagePath;
        $mediaTitle->user_id = auth()->id();
        $mediaTitle->save();

        return redirect()->back()->with('success', 'Media added successfully!');
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
            'title' => 'required|string|max:255',
            'file' => 'required|array|min:1',
            'file.*' => 'mimes:jpg,jpeg,png,pdf,docx,xlsx|max:2048',
            'description' => 'nullable|string|max:500',
        ]);

        $uploadedFiles = $request->file('file');

        if (!$uploadedFiles) {
            return back()->withErrors(['file' => 'No files uploaded']);
        }

        $mediaRecords = [];

        $mediaId = $request->input('media_id');

        $mediaTitle = MediaTitle::find($mediaId);

        if (!$mediaTitle) {
            return back()->withErrors(['media_title' => 'Media title not found']);
        }

        foreach ($uploadedFiles as $file) {
            $fileName = preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $destinationPath = public_path('media/file');

            try {
                $file->move($destinationPath, $fileName);
            } catch (\Exception $e) {
                return back()->withErrors(['file' => 'File could not be moved']);
            }

            if (!file_exists($destinationPath . '/' . $fileName)) {
                return back()->withErrors(['file' => 'File could not be moved']);
            }

            $filePath = $fileName;

            try {
                $mediaRecords[] = Media::create([
                    'media_id' => $mediaTitle->id,
                    'title' => $request->input('title', $fileName),
                    'file' => $filePath,
                    'description' => $request->input('description', $fileName),
                ]);
            } catch (\Exception $e) {
                return back()->withErrors(['file' => 'Error saving media to database']);
            }
        }

        return redirect()->back()->with('success', 'Files uploaded successfully');
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
