<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityLogCTRL extends Controller
{
    public function index()
    {
        $activities = Activity::latest()->get();
        return view('admin.activity-log', compact('activities'));
    }
}
