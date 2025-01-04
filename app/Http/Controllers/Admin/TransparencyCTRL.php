<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TransparencyTitle;
use App\Models\Transparency;
use Illuminate\Http\Request;

class TransparencyCTRL extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $title = TransparencyTitle::all();
        return view('admin.Transparency.index',compact('title'));
    }

    public function transparencyTitle(Request $request)
    {
        $request->validate([
            'transparency_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('media/image'), $imageName);
            $imagePath =$imageName;
        }

        $transparencyTitle = new TransparencyTitle();
        $transparencyTitle->transparency_name = $request->input('transparency_name');
        $transparencyTitle->description = $request->input('description');
        $transparencyTitle->image = $imagePath;
        $transparencyTitle->user_id = auth()->id();
        $transparencyTitle->save();

        return redirect()->back()->with('success', 'Title added successfully!');
    }


    public function content($id)
    {
        $content = transparencyTitle::with('transparency')->findOrFail($id);

        return view('admin.Transparency.add-content', compact('content'));
    }


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

        $transparencyRecords = [];

        $transparencyId = $request->input('transparency_id');

        $transparencyTitle = TransparencyTitle::find($transparencyId);

        if (!$transparencyTitle) {
            return back()->withErrors(['transparency_title' => 'transparency title not found']);
        }

        foreach ($uploadedFiles as $file) {
            $fileName = preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $destinationPath = public_path('transparency/file');

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
                $transparencyRecords[] = Transparency::create([
                    'transparency_id' => $transparencyTitle->id,
                    'title' => $request->input('title', $fileName),
                    'file' => $filePath,
                    'description' => $request->input('description', $fileName),
                ]);
            } catch (\Exception $e) {
                return back()->withErrors(['file' => 'Error saving transparency to database']);
            }
        }

        return redirect()->back()->with('success', 'Files uploaded successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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
