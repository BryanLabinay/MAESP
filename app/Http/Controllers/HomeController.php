<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Farmer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        $countall = User::where('usertype', 'barangay')->count();
        $farmer = Farmer::count();

        // Get raw data from database grouped by month
        $cropsData = DB::table('croppings')
            ->select(DB::raw('MONTH(created_at) as month, COUNT(user_id) as crop_count'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();

        // Create a full list of months
        $months = collect(range(1, 12))->mapWithKeys(function ($month) {
            return [$month => date("F", mktime(0, 0, 0, $month, 10))];
        });

        // Match data to all months, fill missing months with 0
        $formattedData = $months->map(function ($monthName, $monthNumber) use ($cropsData) {
            $cropCount = $cropsData->firstWhere('month', $monthNumber)->crop_count ?? 0;
            return [
                'month' => $monthName,
                'count' => $cropCount,
            ];
        });


        return view('admin.home', compact('formattedData', 'countall', 'farmer'));
    }



    public function auth()
    {
        if (Auth::check()) {

            $user = Auth::user();


            if ($user instanceof User) {
                $usertype = $user->usertype;

                if ($usertype === 'admin') {

                    activity()
                        ->causedBy($user)
                        ->performedOn($user)
                        ->log('Logged in');
                    return redirect()->route('admin.dashboard');
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
