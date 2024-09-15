<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Reactions;
use Illuminate\Http\Request;

class ReactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            // Ensure the request has a valid forum_id
            $forumId = $request->input('forum_id');
            $forum = Forum::find($forumId);

            if (!$forum) {
                return redirect()->back()->withErrors('Invalid forum specified.');
            }

            // Validate the request
            $request->validate([
                'comment_text' => 'nullable|string|max:255',
                // No need to validate forum_id here since we already checked it
            ]);

            // Create a new reaction
            Reactions::create([
                'comment_text' => $request->input('comment_text'),
                'forum_id' => $forumId,
                'reaction_type' => $request->input('reaction_type', 'like'), // Default to 'like' if not provided
            ]);

            // Redirect or return a response
            return redirect()->back()->with('success', 'Comment posted successfully!');
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
