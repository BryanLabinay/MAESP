<?php

namespace App\Http\Controllers\Barangay;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get the logged-in user's ID
        $userId = Auth::id();

        // Define activities for filtering logs
        $activities = [
            'App\Models\User' => 'User Module',
            'App\Models\Farmer' => 'Farmer Module',
        ];

        // Query activity logs
        $logs = Activity::query()
            ->leftJoin('users', 'activity_log.subject_id', '=', 'users.id')
            ->leftJoin('farmers', 'activity_log.subject_id', '=', 'farmers.id')
            ->where(function ($query) use ($userId) {
                // Filter by user type (barangay) and logged-in user
                $query->where('activity_log.subject_type', 'App\Models\User')
                      ->where('users.usertype', 'barangay')
                      ->where('activity_log.causer_id', $userId); // Fetch actions performed by the logged-in user
            })
            ->orWhere(function ($query) use ($userId) {
                // Filter by farmer module and user who added the farmer
                $query->where('activity_log.subject_type', 'App\Models\Farmer')
                      ->where('activity_log.causer_id', $userId); // Fetch farmer actions performed by the logged-in user
            })
            ->orderBy('activity_log.created_at', 'desc')
            ->paginate(10);

        // Return the view with the filtered logs
        return view('barangay.Activity-Log.index', compact('logs', 'activities'));
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
