<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function auth()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'admin') {
                return view('admin.dashboard');
            } else if ($usertype == 'user') { {
                    return view('user.dashboard');
                }
            }
        }
    }
}
