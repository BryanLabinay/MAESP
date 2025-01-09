<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsTitle;
use App\Models\News;
use Illuminate\Http\Request;

class NewsUpdatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = NewsTitle::all();
        return view('admin.NewsAndUpdate.index', compact('news'));
    }

    public function newsTitle(Request $request)
    {
        $request->validate([
            'news_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('media/image'), $imageName);
            $imagePath = $imageName;
        }

        $news = new NewsTitle();
        $news->news_name = $request->input('news_name');
        $news->description = $request->input('description');
        $news->image = $imagePath;
        $news->user_id = auth()->id();
        $news->save();

        return redirect()->back()->with('success', 'Title added successfully!');
    }

    public function content($id)
    {
        $content = NewsTitle::with('news')->findOrFail($id);
        $news = News::where('news_id', $id)->get();

        return view('admin.NewsAndUpdate.content', compact('content', 'news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|array|min:1',
            'file.*' => 'mimes:jpg,jpeg,png,pdf,docx,xlsx|max:2048',
            'description' => 'nullable|string|max:500', // Description validation
        ]);

        $uploadedFiles = $request->file('file');

        if (!$uploadedFiles) {
            return back()->withErrors(['file' => 'No files uploaded']);
        }

        $newsRecords = [];
        $newsId = $request->input('news_id');

        // Check if the news title exists
        $newsTitle = NewsTitle::find($newsId);
        if (!$newsTitle) {
            return back()->withErrors(['news_title' => 'News title not found']);
        }

        foreach ($uploadedFiles as $file) {
            $fileName = preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $destinationPath = public_path('news/file');

            // Attempt to move the uploaded file to the destination path
            try {
                $file->move($destinationPath, $fileName);
            } catch (\Exception $e) {
                return back()->withErrors(['file' => 'File could not be moved']);
            }

            // Verify if the file exists in the destination path
            if (!file_exists($destinationPath . '/' . $fileName)) {
                return back()->withErrors(['file' => 'File could not be moved']);
            }

            $filePath = $fileName;

            // Save the file details in the database
            try {
                $newsRecords[] = News::create([
                    'news_id' => $newsTitle->id,
                    'title' => $request->input('title', $fileName),
                    'file' => $filePath,
                    'description' => $request->input('description', $fileName), // Save the description
                ]);
            } catch (\Exception $e) {
                return back()->withErrors(['file' => 'Error saving file to the database']);
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
