<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceContent;
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
        $request->validate([
            'service_name' => 'nullable|string|max:255',
            'image.*' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'description' => 'nullable|string',
        ]);

        $uploadedFiles = $request->file('image');

        if ($uploadedFiles && is_array($uploadedFiles)) {
            $imagePaths = [];

            foreach ($uploadedFiles as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('image'), $fileName);
                $imagePaths[] = 'image/' . $fileName;
            }

            Service::create([
                'service_name' => $request->input('service_name'),
                'image' => json_encode($imagePaths),
                'user_id' => Auth::id(),
            ]);

            return redirect()->back()->with('success', 'Service and images uploaded successfully');
        } else {
            Service::create([
                'service_name' => $request->input('service_name'),
                'image' => null,
                'user_id' => Auth::id(),
            ]);

            return redirect()->back()->with('success', 'Service created successfully without images');
        }
    }


    public function show($id)
    {
        $service = Service::find($id);

        return view('services.show', compact('service'));
    }


    public function createContentForm($serviceId)
    {
        $service = Service::findOrFail($serviceId);
        return view('admin.Service.add-content', compact('service'));
    }


    public function storeContent(Request $request, $serviceId)
    {
        $request->validate([
            'header' => 'nullable|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();

            $imagePath = $request->file('image')->move(public_path('image'), $imageName);
        }

        ServiceContent::create([
            'service_id' => $serviceId,
            'header' => $request->input('header'),
            'content' => $request->input('content'),
            'image' => 'image/' . $imageName,
        ]);

        // Redirect with success message
        return redirect()->route('service.create', $serviceId)->with('success', 'Content added successfully!');
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
