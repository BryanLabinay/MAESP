<?php

namespace App\Http\Controllers\Admin;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PortfolioCTRL extends Controller
{


    public function index()
    {

        $portfolios = Portfolio::paginate(5);

        return view('admin.Portfolio.index', compact('portfolios'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Unique name
            $image->move(public_path('images'), $imageName); // Save to public/images directory
            $imagePath = $imageName; // Save relative path for database
        }

        // Save to the database
        Portfolio::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $imagePath,
        ]);

        // Redirect with success message
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }

    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id); // Fetch the portfolio by ID
        return view('admin.Portfolio.edit', compact('portfolio')); // Load the edit view
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $portfolio = Portfolio::findOrFail($id);

        // Update fields
        $portfolio->title = $request->input('title');
        $portfolio->description = $request->input('description');

        // Handle image update if provided
        if ($request->hasFile('image')) {
            // Delete old image
            if ($portfolio->image && file_exists(public_path($portfolio->image))) {
                unlink(public_path($portfolio->image));
            }

            // Upload new image
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $portfolio->image = $imageName;
        }

        $portfolio->save(); // Save the updated portfolio

        return redirect()->route('portfolio')->with('success', 'Portfolio updated successfully!');
    }

    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        // Delete the image file if it exists
        if ($portfolio->image && file_exists(public_path($portfolio->image))) {
            unlink(public_path($portfolio->image));
        }

        $portfolio->delete(); // Delete the record from the database

        return redirect()->route('portfolio')->with('success', 'Portfolio deleted successfully!');
    }
}
