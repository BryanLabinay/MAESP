<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        if (Auth::id()) {

            $usertype = Auth::user()->usertype;

            if($usertype == 'admin') {
                return view ('admin.home');
            }
            else if($usertype == 'barangay') {
                return view ('barangay.dashboard');
            }
                else return redirect()->back();

        }

    }
}
