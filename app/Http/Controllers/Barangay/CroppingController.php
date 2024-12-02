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
        $crop = Cropping::where('user_id', $auth)->paginate(10);

        return view('barangay.Cropping.index', compact('crop'));
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('barangay.Cropping.index');

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
