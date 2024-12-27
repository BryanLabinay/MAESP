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
        $auth = Auth::id();
        $farmers = Farmer::where('user_id', $auth)->paginate(10);

        return view('barangay.farmers.list', compact('farmers'));
    }


    public function store(Request $request)
    {
        // Ensure the user is authenticated
        $user_id = Auth::id();
        if (!$user_id) {
            return redirect()->back()->with('error', 'User is not authenticated.');
        }

        // Validate all inputs, except for parcel fields
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255', // Optional field
            'last_name' => 'required|string|max:255',
            'suffix' => 'nullable|string|max:50', // Optional field
            'sex' => 'required|in:male,female',
            'birth_date' => 'required|date',
            'phone_number' => 'required|string|max:15',
            'marital_status' => 'required|string',
            'name_of_spouse' => 'nullable|string|max:255', // Optional field
            'spouse_number' => 'nullable|string|max:15', // Optional field
            'parent_name' => 'required|string|max:255',
            'parent_number' => 'required|string|max:15',
            'address' => 'required|string|max:255',

            // Parcels inputs without required validation
            'farm_location.*' => 'nullable|string|max:255',
            'farm_area.*' => 'nullable|numeric|min:0', // Make it optional
            'farm_type.*' => 'nullable|string|max:255',
            'crop_commodity.*' => 'nullable|string|max:255',
        ]);

        // Build parcels array
        $parcels = [];
        $farm_location = $request->input('farm_location', []);
        $farm_area = $request->input('farm_area', []);
        $farm_type = $request->input('farm_type', []);
        $crop_commodity = $request->input('crop_commodity', []);

        foreach ($farm_location as $index => $location) {
            $parcels[] = [
                'farm_location' => $location,
                'farm_area' => $farm_area[$index] ?? null,
                'farm_type' => $farm_type[$index] ?? null,
                'crop_commodity' => $crop_commodity[$index] ?? null,
            ];
        }

        // Save farmer with parcels as JSON
        Farmer::create([
            'user_id' => $user_id,
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_name'),
            'last_name' => $request->input('last_name'),
            'suffix' => $request->input('suffix'),
            'sex' => $request->input('sex'),
            'birth_date' => $request->input('birth_date'),
            'phone_number' => $request->input('phone_number'),
            'marital_status' => $request->input('marital_status'),
            'name_of_spouse' => $request->input('name_of_spouse'),
            'spouse_number' => $request->input('spouse_number'),
            'parent_name' => $request->input('parent_name'),
            'parent_number' => $request->input('parent_number'),
            'address' => $request->input('address'),
            'parcels' => $parcels, // Store parcels as JSON
        ]);

        return redirect()->back()->with('success', 'Farmer and parcels added successfully!');
    }
}
