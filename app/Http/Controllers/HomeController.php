<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Farmer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }


    public function auth()
    {
        if (Auth::check()) {

            $user = Auth::user();


            if ($user instanceof User) {
                $usertype = $user->usertype;

                if ($usertype === 'admin') {
                    $countall = User::where('usertype', 'barangay')->count();
                    $farmer = Farmer::count();


                    activity()
                        ->causedBy($user)
                        ->performedOn($user)
                        ->log('Logged in');

                    return view('admin.home', compact('countall', 'farmer'));
                } elseif ($usertype === 'barangay') {

                    activity()
                        ->causedBy($user)
                        ->performedOn($user)
                        ->log('Logged in');

                    return view('barangay.dashboard');
                } else {
                    return redirect()->back();
                }
            }
        }
    }
}
