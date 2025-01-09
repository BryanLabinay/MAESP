<?php

namespace App\Http\Controllers\Barangay;

use App\Http\Controllers\Controller;
use App\Models\Cropping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CroppingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth = Auth::id();
        $crop = Cropping::where('user_id', $auth)->get();

        return view('barangay.Cropping.index', compact('crop'));
    }
    public function show()
    {
        return view('barangay.Cropping.show');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barangay.Cropping.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user_id = Auth::id();
        if (!$user_id) {
            return redirect()->back()->with('error', 'User is not authenticated.');
        }

        $parcels = [];
        $farm_location = $request->input('farm_location', []);
        $variety = $request->input('variety', []);
        $farm_type = $request->input('farm_type', []);
        $area = $request->input('area', []);
        $sowing_date = $request->input('sowing_date', []);
        $transplanting_date = $request->input('transplanting_date', []);
        $date_harvested = $request->input('date_harvested', []);
        $gross = $request->input('gross', []);
        $average = $request->input('average', []);
        $crop_commodity = $request->input('crop_commodity', []);

        // Build parcels array
        foreach ($farm_location as $index => $location) {
            $parcels[] = [
                'farm_location' => $location,
                'variety' => $variety[$index] ?? null,
                'farm_type' => $farm_type[$index] ?? null,
                'area' => $area[$index] ?? null,
                'sowing_date' => $sowing_date[$index] ?? null,
                'transplanting_date' => $transplanting_date[$index] ?? null,
                'date_harvested' => $date_harvested[$index] ?? null,
                'gross' => $gross[$index] ?? null,
                'average' => $average[$index] ?? null,
                'crop_commodity' => $crop_commodity[$index] ?? null,
            ];
        }

        Cropping::create([
            'user_id' => $user_id,
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_name'),
            'last_name' => $request->input('last_name'),
            'suffix' => $request->input('suffix'),
            'sex' => $request->input('sex'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'parcels' => $parcels, // Store parcels as JSON
        ]);

        return redirect()->back()->with('success', 'Cropping Reports added successfully!');
    }

    public function view($id){

        $view = Cropping::findOrFail($id);

        return view('barangay.Cropping.view',compact('view'));

    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $assessment = Cropping::findOrFail($id);

        return view('barangay.Cropping.edit',compact('assessment'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Check if the user is authenticated
        $user_id = Auth::id();
        if (!$user_id) {
            return redirect()->back()->with('error', 'User is not authenticated.');
        }

        // Find the cropping record
        $cropping = Cropping::findOrFail($id);

        // Validate incoming request data
        $request->validate([
            'farm_location' => 'required|array',
            'farm_location.*' => 'required|string|max:255',
            'variety' => 'required|array',
            'variety.*' => 'nullable|string|max:255',
            'farm_type' => 'required|array',
            'farm_type.*' => 'nullable|string|max:255',
            'area' => 'required|array',
            'area.*' => 'nullable|numeric|min:0',
            'sowing_date' => 'required|array',
            'sowing_date.*' => 'nullable|date',
            'transplanting_date' => 'required|array',
            'transplanting_date.*' => 'nullable|date',
            'date_harvested' => 'required|array',
            'date_harvested.*' => 'nullable|date',
            'gross' => 'required|array',
            'gross.*' => 'nullable|numeric|min:0',
            'average' => 'required|array',
            'average.*' => 'nullable|numeric|min:0',
            'crop_commodity' => 'required|array',
            'crop_commodity.*' => 'nullable|string|max:255',
        ]);

        // Prepare the updated parcels array
        $parcels = [];
        $farm_location = $request->input('farm_location');
        $variety = $request->input('variety');
        $farm_type = $request->input('farm_type');
        $area = $request->input('area');
        $sowing_date = $request->input('sowing_date');
        $transplanting_date = $request->input('transplanting_date');
        $date_harvested = $request->input('date_harvested');
        $gross = $request->input('gross');
        $average = $request->input('average');
        $crop_commodity = $request->input('crop_commodity');

        // Build the parcels array
        foreach ($farm_location as $index => $location) {
            $parcels[] = [
                'farm_location' => $location,
                'variety' => $variety[$index] ?? null,
                'farm_type' => $farm_type[$index] ?? null,
                'area' => $area[$index] ?? null,
                'sowing_date' => $sowing_date[$index] ?? null,
                'transplanting_date' => $transplanting_date[$index] ?? null,
                'date_harvested' => $date_harvested[$index] ?? null,
                'gross' => $gross[$index] ?? null,
                'average' => $average[$index] ?? null,
                'crop_commodity' => $crop_commodity[$index] ?? null,
            ];
        }

        // Update the cropping record
        $cropping->update([
            'user_id' => $user_id,
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_name'),
            'last_name' => $request->input('last_name'),
            'suffix' => $request->input('suffix'),
            'sex' => $request->input('sex'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'parcels' => $parcels, // Store updated parcels as JSON
        ]);

        return redirect()->route('cropping.index')->with('success', 'Cropping Reports updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
