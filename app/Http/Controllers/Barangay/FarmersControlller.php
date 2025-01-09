<?php

namespace App\Http\Controllers\Barangay;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Farmer;
use App\Models\User;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Notification;
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
        $farmers = Farmer::where('user_id', $auth)->get();

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
        $farmer = Farmer::create([
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

        // Log the creation of the farmer with the current logged-in user as the "causer"
        activity()
            ->causedBy(auth()->user()) // This records the currently logged-in user as the "causer"
            ->performedOn($farmer)      // The "subject" is the created Farmer
            ->log('created');           // Log the action as 'created'

        // Notify the user (farmer) about successful submission
        $user = Auth::user();

        // Notify the admin (role 2) about the new farmer submission
        $admin = User::where('usertype', 'admin')->first();
        if ($admin) {
            $admin->notify(new UserNotification("A new farmer's data has been submitted by {$user->name}."));
        }

        return redirect()->back()->with('success', 'Farmer and parcels added successfully!');
    }

    public function edit($id){

        $farmer = Farmer::findOrFail($id);

        return view('barangay.farmers.edit',compact('farmer'));

    }

    public function update(Request $request, $id)
    {
        $farmer = Farmer::findOrFail($id);

        // Validate form data
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'nullable|string',
            'parcels' => 'array|nullable',
            'parcels.*.farm_location' => 'required|string',
            'parcels.*.farm_area' => 'required|numeric',
            'parcels.*.farm_type' => 'nullable|string',
            'parcels.*.crop_commodity' => 'nullable|string',
            'deleted_parcels' => 'array|nullable',
            'address' => 'nullable|string',
        ]);

        // Filter out parcels marked for deletion
        $parcels = $request->input('parcels', []);
        $deletedParcels = $request->input('deleted_parcels', []);

        // Remove the parcels from the array that need to be deleted
        $parcels = array_filter($parcels, function ($parcel, $index) use ($deletedParcels) {
            return !in_array($index, $deletedParcels);
        }, ARRAY_FILTER_USE_BOTH);

        // Update the farmer data
        $farmer->first_name = $request->input('first_name');
        $farmer->middle_name = $request->input('middle_name');
        $farmer->last_name = $request->input('last_name');
        $farmer->suffix = $request->input('suffix');
        $farmer->sex = $request->input('sex');
        $farmer->birth_date = $request->input('birth_date');
        $farmer->phone_number = $request->input('phone_number');
        $farmer->address = $request->input('address');  // Ensure address is updated
        $farmer->parcels = $parcels;

        $farmer->save();

        return redirect()->route('list.farmers')->with('success', 'Farmer updated successfully.');
    }


    public function status(Request $request, $id, $status)
{
    // Find the farmer by ID
    $farmer = Farmer::findOrFail($id);

    // Validate the status change to ensure it is either 'active' or 'inactive'
    if (!in_array($status, ['active', 'inactive'])) {
        return redirect()->back()->with('error', 'Invalid status value.');
    }

    // Update the farmer's status
    $farmer->status = $status;
    $farmer->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Farmer status updated successfully.');
}

}
