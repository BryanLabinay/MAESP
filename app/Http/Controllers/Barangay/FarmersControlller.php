<?php

namespace App\Http\Controllers\Barangay;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Farmer;
use Illuminate\Support\Facades\Auth;

class FarmersControlller extends Controller
{
    public function index()
    {
        return view('barangay.farmers.create');
    }

    public function show()
    {
        return view('barangay.farmers.list');
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'sex' => 'nullable|in:male,female',
            'marital_status' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255|unique:farmers',
            'farm_name' => 'nullable|string|max:255',
            'farm_location' => 'nullable|string|max:255',
            'farm_size' => 'nullable|string|max:255',
            'crop_type' => 'nullable|string|max:255',
        ]);

        // Add the authenticated user's ID
        $validatedData['user_id'] = Auth::id();

        // Create the farmer record
        Farmer::create($validatedData);

        // Redirect or return a response
        return redirect()->back()->with('success', 'Farmer added successfully');
    }
}
