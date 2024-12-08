<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.Service.service', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function list()
    {
        return view('admin.Service.service-list');
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
     * Display the specified resource.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'service_name' => 'nullable|string|max:255',
        //     'image.*' => 'required|image|mimes:jpg,jpeg,png,gif',
        //     'description' => 'nullable|string',
        // ]);

        $uploadedFiles = $request->file('image');
        $imagePaths = [];

        // Store each uploaded image and get the path
        foreach ($uploadedFiles as $file) {
            $filePath = $file->store('uploads/services', 'public');
            $imagePaths[] = $filePath;  // Add the file path to the array
        }

        // Save service record with all image paths as a JSON array
        Service::create([
            'service_name' => $request->input('service_name'),
            'image' => json_encode($imagePaths),  // Convert the array to JSON
            'user_id' => Auth::id(),
            'description' => $request->input('description'),
        ]);

        // Redirect with success message
        return redirect()->back()->with('success', 'Service and images uploaded successfully');
    }

    public function show($id)
    {
        // Fetch the service by ID
        $service = Service::find($id);

        // Pass the service data to the view
        return view('services.show', compact('service'));
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
