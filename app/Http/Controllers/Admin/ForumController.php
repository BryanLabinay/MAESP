<?php

namespace App\Http\Controllers\Admin;

use Log;
use Exception;
use App\Models\Forum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function forum()
    {
        $forums = Forum::all();
        return view('admin.forum', compact('forums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'nullable|string|max:255',
            'description' => 'required|string',
        ]);

        // Save the form data
        Forum::create($validatedData);

        // Return a JSON response indicating success
        return response()->json(['success' => true]);
    }


    /**
     * Store a newly created resource in storage.
     */
    /**
     * Display the specified resource.
     */
    public function show()
    {
        $forums = Forum::all();
        return view('layouts.userlayout', compact('forums'));
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
