<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventFormRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function event()
    {
        return view('admin.event');
    }

    public function storeEvent(EventFormRequest $request){
        // Create a new event instance
        $event = new Event();

        // Assign form values to the event instance
        $event->title = $request->title;
        $event->description = $request->description;

        // Check if an image was uploaded
        if($request->hasFile('img')){
            // Get the uploaded image
            $img = $request->file('img');

            // Create a unique name for the image file
            $imgName = time() . '.' . $img->getClientOriginalName();

            // Move the image to the 'uploads/event' directory in public folder
            $img->move(public_path('uploads/event'), $imgName);

            // Save the image file name to the 'img' column in the event model
            $event->img = $imgName;
        }

        // Save the event to the database
        $event->save();

        // Redirect back with the event instance and a success status
        return redirect()->back()->with('event', $event)->with('eventStatus', 'Event Added');
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
