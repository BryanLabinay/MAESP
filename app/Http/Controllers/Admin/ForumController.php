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
        return view('admin.forum');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try {
            $forums = new Forum();
            $forums->name = $request->name;
            $forums->subject = $request->subject;
            $forums->description = $request->description;

            $forums->save();

            // Redirect to a named route or specific URL
            return redirect()->url('/');
        } catch (\Exception $e) {
            // Log the exception
            Log::error('Error creating forum: ' . $e->getMessage());

            // Return a generic error message
            return response()->json(['error' => 'An error occurred while creating the forum.'], 500);
        }
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
