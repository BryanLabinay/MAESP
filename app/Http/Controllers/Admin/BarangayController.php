<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Barangay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Farmer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;

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

        return redirect()->back()->with('success', 'Barangay added successfully!');
    }

    public function show()
    {
        $barangays = User::where('usertype', 'barangay')->get();
        return view('admin.brgy-offices', compact('barangays'));
    }



    // Create Account
    public function account()
    {
        $barangay = User::where('usertype', 'barangay')
            ->where('email', 'like', '%@gmail.com')
            ->get(['name', 'email']);
        return view('admin.brgy-account', compact('barangay'));
    }


    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function storeBrgyAcct(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
            'usertype' => ['nullable', 'string', 'max:255'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => $request->usertype,
        ]);

        // event(new Registered($user));

        // Auth::login($user);

        return redirect(route('brgy.create', absolute: false));
    }

    public function barangaydetails($user_id)
    {

        $farmers = Farmer::where('user_id', $user_id)->get();

        return view('admin.brgy-details', compact('farmers'));
    }
}
