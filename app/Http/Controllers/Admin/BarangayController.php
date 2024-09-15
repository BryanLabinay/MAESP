<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barangay;
use Illuminate\Http\Request;

class BarangayController extends Controller
{
    //
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'brgy_name' => 'required|string|max:255',
            'municipality' => 'required|string|max:255',
            'zip_code' => 'nullable|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:50000', // Image validation
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            // Get the uploaded file
            $image = $request->file('image');
            // Create a unique name for the image
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            // Move the image to the public/images directory
            $image->move(public_path('brgy_images'), $imageName);
        } else {
            $imageName = null; // Set to null if no image is uploaded
        }

        // Create a new barangay
        Barangay::create([
            'brgy_name' => $request->brgy_name,
            'municipality' => $request->municipality,
            'zip_code' => $request->zip_code,
            'image' => $imageName, // Save the image file name or null
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Barangay added successfully!');
    }

    public function show()
    {
        // Fetch all barangays from the database
        $barangays = Barangay::all();

        // Pass the barangay data to the view
        return view('admin.brgy-offices', compact('barangays'));
    }

    public function editbrgy($id)
    {
        $barangays = Barangay::findOrFail($id);
        return view('admin.brgy-edit', ['barangay_list' => $barangays]);
    }
}
