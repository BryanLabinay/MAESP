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
        // $events = Event::all();
        // return view('layouts.userlayout', compact('events'));
    }

    public function storeEvent(Request $request)
    {
        $event = new Event();
        $event->title = $request->title;
        $event->description = $request->description;
        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $imgName = time() . '.' . $img->getClientOriginalName();
            $img->move(public_path('uploads/event'), $imgName);
            $event->img = $imgName;
        }
        $event->save();
        return redirect()->back()->with('event', $event)->with('eventStatus', 'Event Added');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function brgy()
    {
        return view('admin.brgy-offices');
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
